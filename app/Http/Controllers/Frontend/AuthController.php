<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.pages.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $request->has('remember'))) {

            if (auth()->user()->role == 'admin') {
                Notify::success('Đăng Nhập Thành Công');
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role == 'instructor') {
                Notify::success('Đăng Nhập Thành Công');
                return redirect()->route('instructor.dashboard');
            } else {
                Notify::success('Đăng Nhập Thành Công');
                return redirect()->route('home');
            }
        }

        Notify::error('Thông tin đăng nhập không chính xác');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Notify::success('Đăng Xuất Thành Công');
        return redirect()->back();
    }

    public function register()
    {
        return view('frontend.pages.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = explode('@', $request->email)[0];

        if ($request->role == 1) {
            $user->role = 'user';
        } else {
            $user->role = 'instructor';
            $user->status = 0;
        }

        $user->password = Hash::make($request->password);

        $user->save();

        auth()->login($user);

        if ($user->role == 'instructor') {
            Notify::success('Đăng Ký Thành Công');
            return redirect()->route('instructor.dashboard');
        }

        Notify::success('Đăng Ký Thành Công');
        return redirect()->route('home');

    }

    public function forgotPassword()
    {
        return view('frontend.pages.forgot-password');
    }

    public function sendResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            Notify::error('Email không tồn tại');
            return redirect()->back();
        }

        Password::sendResetLink($request->only('email'));

        Notify::success('Vui lòng kiểm tra email để đặt lại mật khẩu');
        return redirect()->back()->with('success', 'Vui lòng kiểm tra email để đặt lại mật khẩu');
    }

    public function resetPassword()
    {
        $user = User::where('email', request()->email)->first();
        $token = request()->token;
        return view('frontend.pages.reset-password', compact('user', 'token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            Notify::success('Đặt Lại Mật Khẩu Thành Công');
            return redirect()->route('login');
        } else {
            Notify::error('Đặt Lại Mật Khẩu Thất Bại');
            return redirect()->back();
        }
    }


}