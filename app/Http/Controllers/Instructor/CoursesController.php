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

        if ($request->hasFile('video')) {
            $videoPath = $this->uploadVideo($request, 'video', null, 'courses');
        } elseif ($request->video_url) {
            $videoPath = $request->video_url;
        }

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

        //tạo mục mặc định cho khóa học
        $section = new CourseSection();
        $section->course_id = $course->id;
        $section->title = 'Giới Thiệu';
        $section->save();

        //tạo bài giảng mặc định cho mục
        $lecture = new CourseLecture();
        $lecture->course_section_id = $section->id;
        $lecture->title = 'Giới thiệu';
        $lecture->video = $videoPath;
        $lecture->preview = 1;
        $lecture->save();

        Notify::success('Thêm khóa học mới thành công');
        return redirect()->route('instructor.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = $this->course->getCourseBySlug($slug);
        $sections = $this->section
            ->where('course_id', $course->id)
            ->with('lectures')
            ->get();
        return view('instructor.pages.courses.show', compact('course', 'sections'));
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

        if ($request->hasFile('video')) {
            $videoPath = $this->uploadVideo($request, 'video', $course->video, 'courses');
        } elseif ($request->video_url) {
            $videoPath = $request->video_url;
        }

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
        $course->discount = $request->discount ?? 0;

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
            //kiểm tra xem khoá học đã được mua chưa
            if ($course->orders->count() > 0) {
                Notify::error('Khóa học đã có người mua.Bạn không thể xóa');
                return response()->json(['status' => 'error']);
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

        if ($request->has('video')) {
            $videoUrl = $this->uploadVideo($request, 'video', null, 'lectures');
        } else {
            $videoUrl = $request->link_video;
        }

        if ($request->has('attachment')) {
            $fileAttachment = $this->uploadFileAttachment($request, 'attachment', null, 'lectures');
        } else {
            $fileAttachment = $request->link_attachment;
        }

        $lecture->course_section_id = $request->course_section_id;
        $lecture->title = $request->title;
        $lecture->video = $videoUrl;

        if ($fileAttachment) {
            $lecture->attachment = $fileAttachment;
        }

        $lecture->save();

        Notify::success('Thêm bài giảng mới thành công');
        return redirect()->back();

    }

    public function updateCourseLecture(Request $request, string $id)
    {
        $lecture = $this->lecture->findOrFail($id);

        if ($request->has('video')) {
            $videoUrl = $this->uploadVideo($request, 'video', $lecture->video, 'lectures');
        } else {
            $videoUrl = $request->link_video;
        }

        if ($request->has('attachment')) {
            $fileAttachment = $this->uploadFileAttachment($request, 'attachment', $lecture->attachment, 'lectures');
        } else {
            $fileAttachment = $request->link_attachment;
        }

        $lecture->title = $request->title;
        $lecture->video = $videoUrl;
        $lecture->attachment = $fileAttachment;
        $lecture->preview = $request->preview;

        $lecture->save();

        Notify::success('Cập nhật bài giảng thành công');
        return redirect()->back();
    }

    public function deleteCourseLecture(Request $request, string $id)
    {
        try {
            $lecture = $this->lecture->findOrFail($id);
            $lecture->delete();

            Notify::success('Xóa bài giảng thành công');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Xóa bài giảng thất bại');
            return response()->json(['status' => 'error']);
        }
    }
}
