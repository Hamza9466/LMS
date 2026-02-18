<?php

namespace App\Http\Controllers\Website;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function membership(){
          $nav=Course::all();
      return view('website.pages.member-ship', compact('nav'));
    }
}