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
        $categories = $this->category->where('parent_id', null)->get();

        $courses = $this->course->latest();

        if ($categorySlug = request()->category) {
            $category = $this->category->where('slug', $categorySlug)->first();

            if ($category) {
                if ($category->parent_id == null) {
                    $subCategories = $category->children()->pluck('id')->toArray();

                    $subCategories[] = $category->id;

                    $courses = $this->course->whereIn('category_id', $subCategories)->latest();
                } else {
                    $courses = $category->courses()->latest();
                }
            }
        }

        if (request()->q) {
            $courses = $courses->where('name', 'like', '%' . request()->q . '%');
        }

        if (request()->sort) {
            if (request()->sort == 'name-asc') {
                $courses = $courses->orderBy('name');
            }
            if (request()->sort == 'name-desc') {
                $courses = $courses->orderByDesc('name');
            }
            if (request()->sort == 'price-asc') {
                $courses = $courses->orderBy('price');
            }
            if (request()->sort == 'price-desc') {
                $courses = $courses->orderByDesc('price');
            }
        }

        $courses = $courses->paginate(2);

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

    public function search(Request $request)
    {
        $search = $request->q;
        $courses = $this->course->where('name', 'like', '%' . $search . '%')->get();

        return response()->json([
            'status' => 'success',
            'courses' => $courses
        ]);
    }

}