<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Course;

class CartController extends Controller
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = new Course();
    }

    public function index()
    {
        $cartItems = Cart::content();
        $total = Cart::total(0, '', '');
        $subTotal = Cart::subtotal(0, '', '');

        return view('frontend.pages.cart', compact('cartItems', 'total', 'subTotal'));
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

    public function store(Request $request)
    {
        $id = $request->input('course_id');
        $course = $this->course->findOrFail($id);

        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            if ($cartItem->id == $id) {
                Notify::success('Khoá học đã có trong giỏ hàng');
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
            1,
            $price,
            0,
            [
                'image' => $course->image,
                'slug' => $course->slug,
                'instructor' => $course->instructor->name
            ]
        )->associate('App\Models\Course');

        Notify::success('Thêm vào giỏ hàng thành công');

    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);

        Notify::success('Đã xoá khoá học khỏi giỏ hàng');
        return response()->json(['status' => 'success']);
    }

    public function clear()
    {
        Cart::destroy();

        Notify::success('Đã xoá toàn bộ khoá học khỏi giỏ hàng');
        return response()->json(['status' => 'success']);
    }

    public function applyCoupon(Request $request)
    {
        $coupon = $request->input('coupon');

    }
}