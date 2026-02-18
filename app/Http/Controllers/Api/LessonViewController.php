<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\{Lesson, Quiz};

class LessonViewController extends Controller
{
    /**
     * 📍 GET /api/lessons/{id}
     * Get lesson details (video/pdf, quiz availability, progress, and MCQs)
     */
    public function show(Request $request, Lesson $lesson)
    {
        $user = $request->user();
        $course = $lesson->section->course;

        // ✅ Verify enrollment
        $hasAccess = $user->enrolledCourses()
            ->wherePivotNotNull('purchased_at')
            ->where('courses.id', $course->id)
            ->exists();

        if (!$hasAccess) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied — you are not enrolled in this course.'
            ], 403);
        }

        // ✅ Progress + completion
        $pivot = DB::table('lesson_user')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $user->id)
            ->first();

        $progressPercent = (float)($pivot->progress_percent ?? 0.0);
        $isCompleted = !empty($pivot?->completed_at);
        $quizPassedAt = $pivot->quiz_passed_at ?? null;
        $watchedOK = $progressPercent >= 90.0;

        // ✅ Get published quiz for this lesson
        $quiz = Quiz::where('course_id', $course->id)
            ->where('section_id', $lesson->section_id)
            ->where('is_published', true)
            ->with(['questions.options'])
            ->first();

        $canSeeQuiz = $lesson->type !== 'video' || ($watchedOK && $quiz);

        // ✅ Prepare quiz data with MCQs
        $quizData = null;
        if ($quiz && $canSeeQuiz) {
            $quizData = [
                'quiz_id' => $quiz->id,
                'title' => $quiz->title,
                'description' => $quiz->description ?? null,
                'total_questions' => $quiz->questions->count(),
                'questions' => $quiz->questions->map(function ($q) {
                    return [
                        'id' => $q->id,
                        // Auto-detect actual DB field for question text
                        'question' => $q->question ?? $q->question_text ?? $q->title ?? null,
                        'marks' => $q->marks ?? 1,
                        'options' => $q->options->map(function ($opt) {
                            return [
                                'id' => $opt->id,
                                // Auto-detect actual DB field for option text
                                'option_text' => $opt->option ?? $opt->option_text ?? $opt->text ?? null,
                            ];
                        }),
                    ];
                }),
            ];
        }

        // ✅ Return full lesson details
        return response()->json([
            'status' => true,
            'message' => 'Lesson details fetched successfully.',
            'data' => [
                'lesson_id' => $lesson->id,
                'course_id' => $course->id,
                'section_id' => $lesson->section_id,
                'title' => $lesson->title,
                'description' => $lesson->description ?? null,
                'type' => $lesson->type,
                'video_path' => $lesson->video_path ?? null,
                'video_file' => $lesson->video_file ?? null,
                'pdf_path' => $lesson->pdf_path ?? null,
                'progress_percent' => $progressPercent,
                'is_completed' => $isCompleted,
                'quiz_passed_at' => $quizPassedAt,
                'can_see_quiz' => $canSeeQuiz,
                'has_quiz' => (bool)$quiz,
                'quiz' => $quizData,
            ]
        ], 200);
    }

    /**
     * 📍 POST /api/lessons/{id}/progress
     * Save lesson progress (percent 0–100)
     */
    public function progress(Request $request, Lesson $lesson)
    {
        $user = $request->user();
        $course = $lesson->section->course;

        // ✅ Verify enrollment
        $hasAccess = $user->enrolledCourses()
            ->wherePivotNotNull('purchased_at')
            ->where('courses.id', $course->id)
            ->exists();

        if (!$hasAccess) {
            return response()->json(['status' => false, 'message' => 'Unauthorized.'], 403);
        }

        $data = $request->validate([
            'percent' => 'required|numeric|min:0|max:100',
        ]);

        $percent = round((float)$data['percent'], 2);

        DB::table('lesson_user')->updateOrInsert(
            ['lesson_id' => $lesson->id, 'user_id' => $user->id],
            [
                'progress_percent' => DB::raw('GREATEST(COALESCE(progress_percent,0), '.$percent.')'),
                'watched_at' => now(),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // ✅ Auto-complete PDFs without quiz
        $hasQuiz = Quiz::where('course_id', $course->id)
            ->where('section_id', $lesson->section_id)
            ->where('is_published', true)
            ->exists();

        if ($lesson->type === 'pdf' && !$hasQuiz && $percent >= 100) {
            DB::table('lesson_user')
                ->where('lesson_id', $lesson->id)
                ->where('user_id', $user->id)
                ->update([
                    'completed_at' => DB::raw('COALESCE(completed_at, NOW())'),
                    'updated_at' => now(),
                ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Progress updated successfully.',
        ]);
    }

    /**
     * 📍 POST /api/lessons/{id}/complete
     * Mark lesson as completed (only after quiz passed)
     */
    public function complete(Request $request, Lesson $lesson)
    {
        $user = $request->user();

        $pivot = DB::table('lesson_user')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $user->id)
            ->first();

        if (!$pivot || empty($pivot->quiz_passed_at)) {
            return response()->json([
                'status' => false,
                'message' => 'You must pass the quiz before marking this lesson complete.'
            ], 403);
        }

        DB::table('lesson_user')->updateOrInsert(
            ['lesson_id' => $lesson->id, 'user_id' => $user->id],
            ['completed_at' => now(), 'updated_at' => now(), 'created_at' => now()]
        );

        return response()->json([
            'status' => true,
            'message' => 'Lesson marked as completed.'
        ]);
    }

    /**
     * 📍 GET /api/lessons/{id}/download
     * Download PDF lesson (if allowed)
     */
    public function download(Request $request, Lesson $lesson)
    {
        $user = $request->user();
        $course = $lesson->section->course;

        // ✅ Verify access
        $hasAccess = $user->enrolledCourses()
            ->wherePivotNotNull('purchased_at')
            ->where('courses.id', $course->id)
            ->exists();

        if (!$hasAccess) {
            return response()->json(['status' => false, 'message' => 'Access denied.'], 403);
        }

        if ($lesson->type !== 'pdf' || !$lesson->pdf_path) {
            return response()->json(['status' => false, 'message' => 'PDF not found.'], 404);
        }

        $path = storage_path('app/public/' . $lesson->pdf_path);
        if (!is_file($path)) {
            return response()->json(['status' => false, 'message' => 'File missing on server.'], 404);
        }

        $filename = Str::slug($lesson->title ?: 'lesson') . '.pdf';
        return response()->download($path, $filename, ['Content-Type' => 'application/pdf']);
    }
}