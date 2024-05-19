<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    protected $province;
    protected $district;
    protected $ward;

    public function __construct(Province $province, District $district, Ward $ward)
    {
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
    }

    public function checkout()
    {
        $provinces = $this->province->all();
        $cart = Cart::content();
        $subTotal = Cart::subtotal('0', ',', '.');
        $total = Cart::total('0', ',', '.');

        return view('frontend.pages.checkout', compact('provinces', 'cart', 'subTotal', 'total'));
    }
}