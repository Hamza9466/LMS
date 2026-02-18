<?php

namespace App\Http\Controllers\Website;

use App\Models\Course;
use App\Models\AboutBanner;
use App\Models\AboutIcon;
use App\Models\AboutPost;
use App\Models\AboutGalleryImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $aboutgallerys=AboutGalleryImage::latest()->take(1)->get();
        // latest 3 about posts
        $aboutPosts = AboutPost::latest()->take(3)->get();

        // all banners
        $abouts = AboutBanner::all();

        // navigation courses
        $nav = Course::all();
        $icons=AboutIcon::latest()->take(4)->get();

        return view('website.pages.about', compact('nav', 'aboutPosts', 'abouts','aboutgallerys','icons'));
    }
}