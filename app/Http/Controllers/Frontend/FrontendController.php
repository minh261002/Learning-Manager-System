<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function courses()
    {
        return view('frontend.pages.courses');
    }

    public function course_detail()
    {
        return view('frontend.pages.course-detail');
    }

    public function teachers()
    {
        return view('frontend.pages.teachers');
    }
}