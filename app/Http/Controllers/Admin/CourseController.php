<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Notify;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = new Course();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->course->getAllCourses();
        return view("admin.courses.index", compact('courses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = $this->course->getCourseBySlug($slug);
        return view("admin.courses.show", compact('course'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        try {
            $course = $this->course->findOrFail($request->course_id);
            $course->status = $request->status;
            $course->save();

            Notify::success('Thay đổi trạng thái khóa học thành công');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Đã có lỗi xảy ra');
            return response()->json(['status' => 'error']);
        }
    }
}