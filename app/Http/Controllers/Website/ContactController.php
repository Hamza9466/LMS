<?php

namespace App\Http\Controllers\Website;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact(){
        $nav=Course::all();
        return view('website.pages.contact',compact('nav'));
    }
}