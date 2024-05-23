<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Coupon;
use Illuminate\Validation\Rule;

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
        $subTotal = Cart::initial(0, '', '');

        $discount = Cart::discount(0, '', '');

        return view('frontend.pages.cart', compact('cartItems', 'total', 'subTotal', 'discount'));
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
        if (session()->has('isAppliedCoupon')) {
            session()->forget([
                'isAppliedCoupon',
                'couponName'
            ]);

            Cart::setGlobalDiscount(0);
        }

        $id = $request->input('course_id');
        $course = $this->course->findOrFail($id);

        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            if ($cartItem->id == $course->id) {
                Notify::warning('Khoá học đã có trong giỏ hàng');
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

        if (session()->has('isAppliedCoupon')) {
            session()->forget([
                'isAppliedCoupon',
                'couponName'
            ]);

            Cart::setGlobalDiscount(0);
        }

        Notify::success('Đã xoá khoá học khỏi giỏ hàng');
        return response()->json(['status' => 'success']);
    }

    public function clear()
    {
        Cart::destroy();

        if (session()->has('isAppliedCoupon')) {
            session()->forget([
                'isAppliedCoupon',
                'couponName'
            ]);

            Cart::setGlobalDiscount(0);
        }

        Notify::success('Đã xoá toàn bộ khoá học khỏi giỏ hàng');
        return response()->json(['status' => 'success']);
    }

    public function applyCoupon(Request $request)
    {
        if (session()->has('isAppliedCoupon')) {
            Notify::error('Bạn đã áp dụng mã giảm giá rồi');
            return redirect()->back();
        }

        $request->validate([
            'coupon_name' => 'required'
        ]);

        $couponName = $request->input('coupon_name');

        $coupon = Coupon::where('name', $couponName)->first();

        if (!$coupon) {
            Notify::error('Mã giảm giá không tồn tại');
            return redirect()->back();
        }

        if ($coupon->expires_at < now()) {
            Notify::error('Mã giảm giá đã hết hạn');
            return redirect()->back();
        }

        Cart::setGlobalDiscount($coupon->discount);

        session()->put([
            'isAppliedCoupon' => true,
            'couponName' => $couponName
        ]);

        Notify::success('Áp dụng mã giảm giá thành công');
        return redirect()->back();
    }

    public function removeCoupon()
    {
        Cart::setGlobalDiscount(0);

        session()->forget(
            ['isAppliedCoupon', 'couponName']
        );

        Notify::success('Đã xoá mã giảm giá');
        return response()->json(['status' => 'success']);
    }

}
