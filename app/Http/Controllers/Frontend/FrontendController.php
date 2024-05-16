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
        $categories = $this->category->getAll();
        $slug = request()->query('category');
        $sort = request()->query('sort', 'asc');
        $courses = null;

        if ($slug) {
            $category = $this->category->getCategoryBySlug($slug);

            $categoryIds = $category->children()->pluck('id')->toArray();
            $categoryIds[] = $category->id;


            $courses = $this->course->whereIn('category_id', $categoryIds)->orderBy('created_at', $sort)->paginate(6);
        } else {
            $courses = $this->course->orderBy('created_at', $sort)->paginate(6);
        }

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

    public function cart()
    {
        return view('frontend.pages.cart');
    }

    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
}