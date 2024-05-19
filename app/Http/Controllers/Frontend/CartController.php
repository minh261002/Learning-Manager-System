<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = $this->cart->getCartItem(auth()->id());
        return view('frontend.pages.cart', compact('cartItems'));
    }

    public function getMiniCart()
    {
        $cartItems = $this->cart->getCartItem(auth()->id());
        return response()->json($cartItems);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cartItem = $this->cart->checkItem(request('course_id'), auth()->id());

        if ($cartItem) {
            return Notify::warning('Khoá học đã có trong giỏ hàng');
        }

        $this->cart->addToCart(request('course_id'), auth()->id());
        Notify::success('Khoá học đã được thêm vào giỏ hàng');

        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $this->cart->removeItem($id);
            Notify::success('Khoá học đã được xóa khỏi giỏ hàng');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Có lỗi xảy ra, vui lòng thử lại sau');
            return response()->json(['status' => 'error']);
        }
    }

    public function clear()
    {
        try {
            $this->cart->removeAllItem(auth()->id());
            Notify::success('Giỏ hàng đã được xóa');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Có lỗi xảy ra, vui lòng thử lại sau');
            return response()->json(['status' => 'error']);
        }
    }

}