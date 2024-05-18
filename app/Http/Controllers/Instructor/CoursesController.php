<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CourseSection;
use App\Models\CourseLecture;

class CoursesController extends Controller
{
    use FileUploadTrait;
    protected Category $category;
    protected Course $course;
    protected CourseSection $section;
    protected CourseLecture $lecture;


    public function __construct(Category $category, Course $course, CourseSection $section, CourseLecture $lecture)
    {
        $this->category = $category;
        $this->course = $course;
        $this->section = $section;
        $this->lecture = $lecture;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->course->getCourseByInstructor(auth()->id());
        return view('instructor.pages.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('instructor.pages.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();

        $imagePath = $this->uploadImage($request, 'image', null, 'courses');
        $videoPath = $this->uploadVideo($request, 'video', null, 'courses')['url'];

        if ($imagePath) {
            $course->image = $imagePath;
        }

        if ($videoPath) {
            $course->video = $videoPath;
        }

        $course->name = $request->name;
        $course->slug = createSlug(Course::class, $request->name);
        $course->category_id = $request->category_id;
        $course->instructor_id = auth()->id();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->prerequisites = $request->prerequisites;
        $course->outcomes = $request->outcomes;
        $course->language = $request->language;
        $course->price = $request->price;
        $course->discount = $request->discount;

        $course->save();

        Notify::success('Thêm khóa học mới thành công');
        return redirect()->route('instructor.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = $this->course->getCourseBySlug($slug);
        $sections = $this->section->getAllSections();
        $lectures = $this->lecture->getAllLectures();
        return view('instructor.pages.courses.show', compact('course', 'sections', 'lectures'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->category->getAll();
        $course = $this->course->findOrFail($id);
        return view('instructor.pages.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = $this->course->findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $course->image, 'courses');
        $videoResult = $this->uploadVideo($request, 'video', $course->video, 'courses');

        $videoPath = is_array($videoResult) && isset($videoResult['url']) ? $videoResult['url'] : $course->video;

        if ($course->name !== $request->name) {
            $course->slug = createSlug(Course::class, $request->name);
        }

        $course->name = $request->name;

        $course->image = $imagePath ?? $course->image;
        $course->video = $videoPath ?? $course->video;
        $course->category_id = $request->category_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->prerequisites = $request->prerequisites;
        $course->outcomes = $request->outcomes;
        $course->language = $request->language;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->status = 1;

        $course->save();

        Notify::success('Cập nhật thông tin khóa học thành công');
        return redirect()->route('instructor.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $course = $this->course->findOrFail($id);

            if ($course->image) {
                $this->deleteFile($course->image);
            }

            if ($course->video) {
                $this->deleteFile($course->video);
            }

            $course->delete();

            Notify::success('Xóa khóa học thành công');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Xóa khóa học thất bại');
            return response()->json(['status' => 'success']);
        }
    }

    public function addCourseSection(Request $request)
    {
        $section = new CourseSection();

        $section->course_id = $request->course_id;
        $section->title = $request->name;
        $section->save();

        Notify::success('Thêm mục mới thành công');
        return redirect()->back();
    }

    public function updateCourseSection(Request $request, string $id)
    {
        $section = $this->section->findOrFail($id);

        $section->title = $request->name;
        $section->save();

        Notify::success('Cập nhật mục thành công');
        return redirect()->back();
    }

    public function deleteCourseSection(Request $request, string $id)
    {
        try {
            $section = $this->section->findOrFail($id);
            $section->delete();

            Notify::success('Xóa mục thành công');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Xóa mục thất bại');
            return response()->json(['status' => 'error']);
        }
    }

    public function addCourseLecture(Request $request)
    {

        $lecture = new CourseLecture();

        $videoResult = $this->uploadVideo($request, 'video', null, 'lectures');
        $videoUrl = is_array($videoResult) && isset($videoResult['url']) ? $videoResult['url'] : null;
        $videoDuration = is_array($videoResult) && isset($videoResult['duration']) ? $videoResult['duration'] : null;
        $fileAttachment = $this->uploadFileAttachment($request, 'attachment', null, 'lectures');

        $lecture->course_section_id = $request->course_section_id;
        $lecture->title = $request->name;
        $lecture->video = $videoUrl;
        $lecture->duration = $videoDuration;

        if ($fileAttachment) {
            $lecture->attachment = $fileAttachment;
        }

        $lecture->save();

        Notify::success('Thêm bài giảng mới thành công');
        return redirect()->back();

    }
}
