<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    /**
     * 📍 GET /api/quiz-attempts/{id}
     * Returns quiz attempt details with questions, options, and correctness.
     */
    public function show(Request $request, QuizAttempt $attempt)
    {
        $user = $request->user();

        // ✅ Check if this attempt belongs to the logged-in user
        if ($attempt->user_id !== $user->id) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized access.',
            ], 403);
        }

        // ✅ Load related quiz + questions + options
        $attempt->load([
            'quiz:id,title,description,course_id,section_id',
            'answers.question.options',
        ]);

        // ✅ Prepare question-answer data
        $answersData = $attempt->answers->map(function ($answer) {
            $question = $answer->question;

            // Ensure question exists
            if (!$question) return null;

            $selectedIds = is_array($answer->selected_option_ids)
                ? $answer->selected_option_ids
                : json_decode($answer->selected_option_ids ?? '[]', true);

            return [
                'question_id'   => $question->id,
                'question'      => $question->text ?? null,
                'marks'         => $question->points ?? 1,
                'options'       => $question->options->map(function ($opt) use ($selectedIds) {
                    return [
                        'id'          => $opt->id,
                        'option_text' => $opt->text,
                        'is_correct'  => (bool)$opt->is_correct,
                        'is_selected' => in_array($opt->id, $selectedIds ?? []),
                    ];
                }),
                'is_correct'    => $question->correctOptionIds() == $selectedIds,
                'earned_marks'  => ($question->correctOptionIds() == $selectedIds)
                    ? ($question->points ?? 1)
                    : 0,
            ];
        })->filter()->values(); // filter out nulls

        // ✅ Build final response
        return response()->json([
            'status'  => true,
            'message' => 'Quiz result fetched successfully.',
            'data'    => [
                'quiz_id'          => $attempt->quiz->id,
                'quiz_title'       => $attempt->quiz->title,
                'description'      => $attempt->quiz->description ?? null,
                'status'           => ucfirst($attempt->status),
                'score'            => (float)$attempt->score,
                'percentage'       => (float)$attempt->percentage,
                'is_passed'        => (bool)$attempt->is_passed,
                'duration_seconds' => (int)$attempt->duration_seconds,
                'started_at'       => optional($attempt->started_at)->format('Y-m-d H:i'),
                'submitted_at'     => optional($attempt->submitted_at)->format('Y-m-d H:i'),
                'answers'          => $answersData,
            ],
        ], 200);
    }
}