<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
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
        return view('admin.dashboard.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function profile()
    {
        $user = Auth::user();

        $provinces = $this->province->getAll();
        $districts = $this->district->getByProvince($user->province_code);
        $wards = $this->ward->getByDistrict($user->district_code);

        return view('admin.profile.index', compact('user', 'provinces', 'districts', 'wards'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:users,username,' . auth()->id()],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
        ]);

        $user = auth()->user();

        $imagePath = $this->uploadImage($request, 'photo', $user->avatar, 'avatar');

        if($imagePath){
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

        Notify::success('Cập nhật thông tin thành công');
        return redirect()->route('admin.profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = auth()->user();

        $user->password = Hash::make($request->password);

        $user->save();

        Notify::success('Đổi mật khẩu thành công');
        return redirect()->route('admin.profile');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Notify::success('Đăng xuất thành công');
        return redirect()->route('admin.login');
    }
}