<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();

        return view('user.pages.wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course_id = $request->course_id;
        $user_id = auth()->user()->id;

        $wishlist = Wishlist::where('user_id', $user_id)->where('course_id', $course_id)->first();

        if ($wishlist) {
            Notify::error('Khoá học đã có trong danh sách yêu thích của bạn');
            return response()->json([
                'status' => 'error',
                'message' => 'Khoá học đã có trong danh sách yêu thích của bạn'
            ]);
        }

        Wishlist::create([
            'user_id' => $user_id,
            'course_id' => $course_id
        ]);

        Notify::success('Đã thêm khoá học vào danh sách yêu thích của bạn');
        return response()->json([
            'status' => 'success',
            'message' => 'Đã thêm khoá học vào danh sách yêu thích của bạn'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try{
            Wishlist::where('id', $id)->delete();
            Notify::success('Đã xóa khóa học khỏi danh sách yêu thích của bạn');
            return response()->json([
                'status' => 'success',
                'message' => 'Đã xóa khóa học khỏi danh sách yêu thích của bạn'
            ]);
        } catch (\Exception $e) {
            Notify::error('Có lỗi xảy ra, vui lòng thử lại sau');
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra, vui lòng thử lại sau'
            ]);
        }
    }
}