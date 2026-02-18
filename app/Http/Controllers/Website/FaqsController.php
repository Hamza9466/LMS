<?php

namespace App\Http\Controllers\Website;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\FaqStudent;
use App\Models\FaqTeacher;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function faqs(){
          $nav=Course::all();
          $faqstudent = FaqStudent::all();
          $faqteacher = FaqTeacher::all();
        return view('website.pages.faqs',compact('nav','faqstudent','faqteacher'));
    }
}