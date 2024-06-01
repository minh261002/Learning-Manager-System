<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    private $category;
    private $course;

    private $districts;
    private $wards;

    public function __construct(Category $category, Course $course, District $district, Ward $ward)
    {
        $this->category = $category;
        $this->course = $course;
        $this->districts = $district;
        $this->wards = $ward;
    }

    public function index()
    {
        $newCourses = $this->course->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->latest()
            ->limit(8)
            ->get();

        $bestSellerCourses = $this->course->where('status', 1)
            ->whereHas('orders', function ($query) {
                $query->whereHas('payment', function ($q) {
                    $q->where('status', 'success');
                });
            })
            ->limit(4)
            ->get();

        $bestRatingCourses = $this->course->where('status', 1)
            ->whereHas('reviews')
            ->with('reviews')
            ->limit(4)
            ->get()
            ->sortByDesc(function ($course) {
                return $course->reviews->avg('rating');
            });


        $categories = $this->category->where('parent_id', null)->get();
        return view('frontend.pages.home', compact('categories', 'newCourses', 'bestSellerCourses', 'bestRatingCourses'));
    }
    public function courses()
    {
        $allCategories = $this->category->all();
        $categories = $this->category->where('parent_id', null)->pluck('id');

        $courses = $this->course->query()->where('status', 1);

        $categorySlug = request()->category;
        $q = request()->q;

        $sort = request()->sort;

        $lang = request()->lang;

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

        $courses->when($lang, function ($query) use ($lang) {
            $query->where('language', $lang);
        });

        //sắp xếp mặc định theo created_at
        if (!request()->sort) {
            $courses->latest();
        }

        $courses = $courses->paginate(6)->withQueryString();

        return view('frontend.pages.courses', compact('courses', 'categories', 'allCategories'));
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
        $related = $this->course->where('instructor_id', $course->instructor_id)->where('id', '!=', $course->id)->get();
        return view('frontend.pages.course-detail', compact('course', 'related'));
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $courses = $this->course->where('name', 'like', '%' . $search . '%')->limit(5)->get();

        return response()->json([
            'status' => 'success',
            'courses' => $courses
        ]);
    }

    public function instructor()
    {
        //lấy thông tin theo username
        $instructor = User::where('username', request()->username)->first();
        $courses = $this->course->where('instructor_id', $instructor->id)->get();

        return view('frontend.pages.instructor', compact('instructor', 'courses'));
    }

    function view_course($slug)
    {
        $course = $this->course->getCourseBySlug($slug);
        $sections = $course->section()->with('lectures')->get();

        return view('frontend.pages.view_course', compact('course', 'sections'));
    }

    public function admission()
    {
        $user = Auth::user();

        $provinces = Province::all();
        $districts = $this->districts->getByProvince($user?->province_id);
        $wards = $this->wards->getByDistrict($user?->district_id);

        return view('frontend.pages.admission', compact('provinces', 'districts', 'wards'));
    }

}