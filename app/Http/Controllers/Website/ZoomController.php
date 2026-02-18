<?php

namespace App\Http\Controllers\Website;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;

class ZoomController extends Controller
{
    public function Zoom(){
        $nav=Course::all();
        $meetings = ZoomMeeting::all();
        return view('website.pages.zoom-meetings',compact('nav','meetings'));
    }
}