<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EnrolledCourseController extends Controller
{
   public function index()
{
    $user = auth()->user();

    $courses = $user->enrolledCourses()
        ->wherePivotNotNull('purchased_at')
        ->withCount('lessons')
        ->latest('course_user.purchased_at')
        ->get();

    // completed lessons per course (you already had this)
    $completedByCourse = DB::table('lesson_user')
        ->join('lessons', 'lesson_user.lesson_id', '=', 'lessons.id')
        ->join('sections', 'lessons.section_id', '=', 'sections.id')
        ->select('sections.course_id', DB::raw('COUNT(*) as completed_count'))
        ->where('lesson_user.user_id', $user->id)
        ->groupBy('sections.course_id')
        ->pluck('completed_count', 'sections.course_id');

    // ✅ map of the current user's review ids per course: [course_id => review_id]
    $myReviewIdsByCourse = DB::table('course_reviews')
        ->where('user_id', $user->id)
        ->pluck('id', 'course_id');

    return view('admin.pages.enrolledCourses.enrolled_courses', compact(
        'courses', 'completedByCourse', 'myReviewIdsByCourse'
    ));
}
}