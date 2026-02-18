<?php

namespace App\Http\Controllers\Website;

use App\Models\Course;
use App\Models\StudentDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CourseDetailController extends Controller
{
     public function CourseDetail(string $slug)
    {
        $nav = Course::select('id','title','slug','thumbnail')->latest()->take(10)->get();
        $section = Course::all();

        $course = Course::with([
            'teacher',
            'sections.lessons',
            'approvedReviews.user'
        ])->where('slug', $slug)->firstOrFail();

        $teacher = $course->teacher;

        // ✅ use the relations we defined / already have
        $teacherCoursesCount  = $teacher?->courses()->count() ?? 0;
        $teacherReviewsCount  = $teacher?->taughtReviews()->count() ?? 0;
        $teacherStudentsCount = $teacher ? $teacher->taughtStudentsCount() : 0;

        $approvedReviews = $course->approvedReviews;
        $averageRating   = round($approvedReviews->avg('rating'), 1);
        $totalRatings    = $approvedReviews->count();

        return view('website.pages.course-detail', compact(
            'nav',
            'course',
            'section',
            'teacherCoursesCount',
            'teacherStudentsCount',
            'teacherReviewsCount',
            'approvedReviews',
            'averageRating',
            'totalRatings'
        ));
    }
}