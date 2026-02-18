<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionViewController extends Controller
{
    /**
     * 📍 GET /api/sections/{id}
     * Show section details only (no lessons)
     */
    public function show(Request $request, Section $section)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        // ✅ Get related course
        $course = $section->course;

        // ✅ Check if the user is enrolled
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

        // ✅ Total lessons in this section
        $totalLessons = $section->lessons()->count();

        // ✅ Completed lessons for this user
        $completedLessons = DB::table('lesson_user')
            ->join('lessons', 'lesson_user.lesson_id', '=', 'lessons.id')
            ->where('lessons.section_id', $section->id)
            ->where('lesson_user.user_id', $user->id)
            ->count();

        // ✅ Calculate progress %
        $progressPercent = $totalLessons > 0
            ? round(($completedLessons / $totalLessons) * 100, 1)
            : 0;

        // ✅ Build clean response
        return response()->json([
            'status' => true,
            'message' => 'Section details fetched successfully.',
            'data' => [
                'course_id' => $course->id,
                'section_id' => $section->id,
                'section_title' => $section->title,
                'total_lessons' => $totalLessons,
                'completed_lessons' => $completedLessons,
                'progress_percent' => $progressPercent,
            ]
        ], 200);
    }
}