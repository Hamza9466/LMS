<?php

namespace App\Http\Controllers\Website;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursehubConroller extends Controller
{
     public function course_hub(){
        $nav=Course::all();
        $categories = CourseCategory::latest()->take(5)->get();
        $courses=Course::get();
        // dd($courses);
        return view("website.pages.course-hub" , compact('courses','nav','categories'));
    }
}