<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUploadTrait;
use App\Services\Notify;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use FileUploadTrait;

    public $province;
    public $district;
    public $ward;

    function __construct()
    {
        $this->province = new Province();
        $this->district = new District();
        $this->ward = new Ward();
    }
    public function index()
    {
        return view('user.pages.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        $provinces = $this->province->getAll();
        $districts = $this->district->getByProvince($user->province_id);
        $wards = $this->ward->getByDistrict($user->district_id);

        return view('user.pages.profile', compact('provinces', 'districts', 'wards'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:users,username,' . auth()->id()],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
        ]);

        $user = Auth::user();

        $imagePath = $this->uploadImage($request, 'photo', $user->photo, 'instructor');

        if ($imagePath) {
            $user->photo = $imagePath;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province_id = $request->province;
        $user->district_id = $request->district;
        $user->ward_id = $request->ward;
        $user->bio = $request->bio;

        $user->save();

        Notify::success('Thông tin cá nhân đã được cập nhật thành công!');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        Notify::success('Mật khẩu đã được thay đổi thành công!');
        return redirect()->back();
    }

    public function myCourse()
    {
        $courses = Auth::user()
            ->orders->map(function ($order) {
                return $order->course;
            });
        return view('user.pages.my-course', compact('courses'));
    }

    public function myRating(){
        $reviews = Auth::user()->reviews;
        return view('user.pages.my-rating', compact('reviews'));
    }
}