<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;

class FrontendController extends Controller
{
    private $category;
    private $course;

    public function __construct(Category $category, Course $course)
    {
        $this->category = $category;
        $this->course = $course;
    }

    public function index()
    {
        $categories = $this->category->where('parent_id', null)->get();
        return view('frontend.pages.home', compact('categories'));
    }

    public function courses()
    {
        $courses = $this->course->latest()->get();
        $categories = $this->category->where('parent_id', null)->get();
        return view('frontend.pages.courses', compact('courses', 'categories'));
    }


    public function course_detail($slug)
    {
        $course = $this->course->getCourseBySlug($slug);
        return view('frontend.pages.course-detail', compact('course'));
    }

    public function teachers()
    {
        return view('frontend.pages.teachers');
    }


}