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

        $cartItems = Cart::content();

        // Kiểm tra nếu mục đã tồn tại trong giỏ hàng
        foreach ($cartItems as $cartItem) {
            if ($cartItem->id == $id) {
                Notify::error('Khóa học đã có trong giỏ hàng');
                return redirect()->back();
            }
        }

        if ($course->discount > 0) {
            $price = $course->price - ($course->price * $course->discount / 100);
        } else {
            $price = $course->price;
        }

        Cart::add(
            $course->id,
            $course->name,
            1, // Số lượng mặc định là 1
            $price,
            0, // Khối lượng mặc định là 0 vì không có trọng lượng
            [
                'image' => $course->image,
                'instructor' => $course->instructor->name,
                'slug' => $course->slug
            ]
        )->associate('App\Models\Course');

        Notify::success('Thêm vào giỏ hàng thành công');
    }

    public function cartData()
    {
        $carts = Cart::content();
        $total = Cart::total(0, '', '');
        $cartQty = Cart::count();

        return response()->json([
            'carts' => $carts,
            'total' => $total,
            'cartQty' => $cartQty
        ]);
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
        try {
            Cart::remove($id);
            Notify::success('Xóa khỏi giỏ hàng thành công');
            return response()->json(['success' => 'Xóa khỏi giỏ hàng thành công']);
        } catch (\Exception $e) {
            Notify::error('Xóa khỏi giỏ hàng thất bại');
            return response()->json(['error' => 'Xóa khỏi giỏ hàng thất bại'], 422);
        }
    }

    public function clear()
    {
        Cart::destroy();
        Notify::success('Xóa toàn bộ giỏ hàng thành công');
    }
}