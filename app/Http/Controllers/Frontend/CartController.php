<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Services\Notify;
use App\Models\Course;

class CartController extends Controller
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total(0, '', '');

        return view('frontend.pages.cart', compact('carts', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('course_id');
        $course = $this->course->findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            Notify::error('Khoá học đã có trong giỏ hàng');
            return response()->json(['error' => 'Khoá học đã có trong giỏ hàng'], 422);
        }

        if ($course->discount > 0) {
            $price = $course->price - ($course->price * $course->discount / 100);
        } else {
            $price = $course->price;
        }

        Cart::add(
            $course->id,
            $course->name,
            1, // Số lượng là 1 vì là khóa học
            $price,
            0, // Khối lượng mặc định là 0 vì không có trọng lượng
            [
                'image' => $course->image,
                'instructor' => $course->instructor->name
            ]
        )->associate('App\Models\Course');

        Notify::success('Thêm vào giỏ hàng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}