<?php

namespace App\Http\Controllers\Website;

use App\Models\Course;
use App\Models\BlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function Blog()
    {
        // Get all blogs
        $blogs = BlogPost::all();
        $nav = Course::all();

        return view('website.pages.blog', compact('nav', 'blogs'));
    }
}