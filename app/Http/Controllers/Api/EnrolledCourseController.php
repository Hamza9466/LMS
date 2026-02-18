<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EnrolledCourseController extends Controller
{
    /**
     * 📍 GET /api/enrolled-courses
     * Returns enrolled courses + purchase history for the logged-in user.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        // ✅ Fetch enrolled courses with all required relations
        $courses = $user->enrolledCourses()
            ->wherePivotNotNull('purchased_at')
            ->with(['teacher.teacherDetail', 'category', 'lessons.section'])
            ->withCount('lessons')
            ->latest('course_user.purchased_at')
            ->get();

        // ✅ Completed lessons count per course
        $completedByCourse = DB::table('lesson_user')
            ->join('lessons', 'lesson_user.lesson_id', '=', 'lessons.id')
            ->join('sections', 'lessons.section_id', '=', 'sections.id')
            ->select('sections.course_id', DB::raw('COUNT(*) as completed_count'))
            ->where('lesson_user.user_id', $user->id)
            ->groupBy('sections.course_id')
            ->pluck('completed_count', 'sections.course_id');

        // ✅ User reviews
        $myReviewIdsByCourse = DB::table('course_reviews')
            ->where('user_id', $user->id)
            ->pluck('id', 'course_id');

        // ✅ Format enrolled courses
        $enrolledCourses = $courses->map(function ($course) use ($completedByCourse, $myReviewIdsByCourse) {
            $completed = $completedByCourse[$course->id] ?? 0;
            $total     = $course->lessons_count ?? 0;
            $progress  = $total > 0 ? round(($completed / $total) * 100, 1) : 0;

            // ✅ Build teacher name from teacher_details
            $teacherName = 'N/A';
            if ($course->teacher) {
                $td = $course->teacher->teacherDetail;
                if ($td && ($td->first_name || $td->last_name)) {
                    $teacherName = trim(($td->first_name ?? '') . ' ' . ($td->last_name ?? ''));
                } else {
                    $teacherName = $course->teacher->email ?? 'N/A';
                }
            }

            // ✅ Use discount_price if available, else pivot price or course price
            $finalPrice = optional($course->pivot)->price
                ?? ($course->discount_price ?? $course->price ?? 0);

            return [
                'id' => $course->id,
                'title' => $course->title,
                'slug' => $course->slug,
                'category' => $course->category->name ?? null,
                'teacher' => $teacherName,
                'lessons_count' => $total,
                'completed_lessons' => $completed,
                'progress_percent' => $progress,
                'review_id' => $myReviewIdsByCourse[$course->id] ?? null,
                'purchased_at' => optional($course->pivot)->purchased_at,
                'thumbnail' => $course->thumbnail ?? null,
                'duration' => $course->duration ?? null,
                'price' => number_format($finalPrice, 2),
            ];
        });

        // ✅ Purchase History Section
        $purchaseHistory = $courses->map(function ($course, $index) {
            $finalPrice = optional($course->pivot)->price
                ?? ($course->discount_price ?? $course->price ?? 0);

            return [
                'index' => '#' . ($index + 1),
                'course_title' => $course->title,
                'amount' => '$' . number_format($finalPrice, 2),
                'status' => 'Completed',
                'date' => optional($course->pivot)->purchased_at
                    ? date('F d, Y', strtotime($course->pivot->purchased_at))
                    : null,
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Enrolled courses fetched successfully.',
            'data' => [
                'enrolled_courses' => $enrolledCourses,
                'purchase_history' => $purchaseHistory,
            ]
        ], 200);
    }
}