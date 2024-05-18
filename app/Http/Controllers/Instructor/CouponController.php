<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Course;

class CouponController extends Controller
{
    protected $coupon;
    protected $course;

    public function __construct(Coupon $coupon, Course $course)
    {
        $this->coupon = new Coupon();
        $this->course = new Course();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = $this->coupon->getCouponsByInstructor_id(auth()->id());
        return view('instructor.pages.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->course->getCourseByInstructor(auth()->id());
        return view('instructor.pages.coupons.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coupons,name',
            'discount' => 'required',
            'expires_at' => 'required',
        ]);

        $coupon = $this->coupon;

        $expires_at = date('Y-m-d 0:0:0', strtotime($request->expires_at));

        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->expires_at = $expires_at;
        $coupon->instructor_id = auth()->id();
        $coupon->course_id = $request->course_id ?? null;

        $coupon->save();

        Notify::success('Thêm mã giảm giá thành công');
        return redirect()->route('instructor.coupons.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = $this->coupon->findOrFail($id);
        $courses = $this->course->getCourseByInstructor(auth()->id());
        return view('instructor.pages.coupons.edit', compact('coupon', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:coupons,name,' . $id,
                'discount' => 'required',
                'expires_at' => 'required',
            ]
        );

        $coupon = $this->coupon->findOrFail($id);

        $expires_at = date('Y-m-d 0:0:0', strtotime($request->expires_at));

        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->expires_at = $expires_at;
        $coupon->course_id = $request->course_id ?? null;

        $coupon->save();

        Notify::success('Cập nhật mã giảm giá thành công');
        return redirect()->route('instructor.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->coupon->findOrFail($id)->delete();
            Notify::success('Xóa mã giảm giá thành công');
            return response()->json(['status' => 'success']);
        }catch (\Exception $e){
            return response()->json(['status' => 'error']);
        }
    }
}