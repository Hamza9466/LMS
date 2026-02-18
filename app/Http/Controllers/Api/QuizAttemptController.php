<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class QuizAttemptController extends Controller
{
    /**
     * 📍 GET /api/quiz-attempts
     * Returns all quiz attempts of the logged-in student
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        // ✅ Fetch all attempts for this student
        $attempts = QuizAttempt::with(['quiz:id,title'])
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        if ($attempts->isEmpty()) {
            return response()->json([
                'status'  => true,
                'message' => 'No quiz attempts found.',
                'data'    => []
            ], 200);
        }

        // ✅ Format response
        $data = $attempts->map(function ($attempt, $index) {
            return [
                'index'           => $index + 1,
                'quiz_id'         => $attempt->quiz_id,
                'quiz_title'      => $attempt->quiz->title ?? 'Untitled Quiz',
                'date'            => $attempt->created_at->format('F d, Y h:i A'),
                'score'           => number_format($attempt->score ?? 0, 2),
                'percentage'      => number_format($attempt->percentage ?? 0, 2) . '%',
                'is_passed'       => (bool) $attempt->is_passed,
                'result'          => $attempt->is_passed ? 'Pass' : 'Fail',
                'duration_seconds'=> $attempt->duration_seconds ?? 0,
                'ip_address'      => $attempt->ip_address ?? null,
            ];
        });

        return response()->json([
            'status'  => true,
            'message' => 'Quiz attempts fetched successfully.',
            'data'    => $data
        ], 200);
    }
}