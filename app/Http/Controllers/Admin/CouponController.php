<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Services\Notify;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = new Coupon();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = $this->coupon->getAllCoupons();
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
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

        $this->coupon->create($request->all());
        Notify::success('Thêm mã giảm giá thành công');
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = $this->coupon->findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
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

        $this->coupon->findOrFail($id)->update($request->all());
        Notify::success('Cập nhật mã giảm giá thành công');
        return redirect()->route('admin.coupons.index');
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
        } catch (\Exception $e) {
            Notify::error('Xóa mã giảm giá thất bại');
            return response()->json(['status' => 'error']);
        }
    }
}