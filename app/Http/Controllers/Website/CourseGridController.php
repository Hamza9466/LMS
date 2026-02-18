<?php

namespace App\Http\Controllers\Website;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;

class CourseGridController extends Controller
{
    public function CourseGrid(?CourseCategory $category = null)
    {
        $navCategories = CourseCategory::select('id','name','slug')->orderBy('name')->get();

        $query = Course::with(['category:id,name,slug'])
            ->where('status', 'published');

        if ($category) {
            // If your Course table has a `category_id` FK:
            $query->where('category_id', $category->id);
            // Alternatively, if many-to-many use:
            // $query->whereHas('categories', fn($q) => $q->where('course_categories.id', $category->id));
        }

        $courses = $query->latest('published_at')->get();

        return view('website.pages.course-grid', compact('courses', 'navCategories', 'category'));
    }
}