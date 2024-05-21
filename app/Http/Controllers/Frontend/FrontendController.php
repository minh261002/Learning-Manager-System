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
        $categories = $this->category->where('parent_id', null)->pluck('id');

        $courses = $this->course->query();

        $categorySlug = request()->category;
        $q = request()->q;

        $sort = request()->sort;

        $courses->when($categorySlug, function ($query) use ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $category = $this->category->where('slug', $categorySlug)->first();
                $subCategories = $this->getSubCategories($category);
                $q->whereIn('id', $subCategories);
            });
        });

        $courses->when($q, function ($query) use ($q) {
            $query->where('name', 'like', '%' . $q . '%');
        });

        $courses->when($sort, function ($query) use ($sort) {
            switch ($sort) {
                case 'newest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'DESC');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'DESC');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'ASC');
                    break;
                default:
                    $query->latest();
                    break;
            }
        });

        $courses = $courses->paginate(2);

        return view('frontend.pages.courses', compact('courses', 'categories'));
    }

    protected function getSubCategories($category)
    {
        $subCategories = [];

        if ($category) {
            $subCategories = $category->children()->pluck('id')->toArray();
            $subCategories[] = $category->id;
        }

        return $subCategories;
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