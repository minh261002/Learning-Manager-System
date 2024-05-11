<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.pages.login');
    }

    public function register()
    {
        return view('frontend.pages.register');
    }

    public function forgotPassword()
    {
        return view('frontend.pages.forgot-password');
    }

    public function resetPassword()
    {
        return view('frontend.pages.reset-password');
    }
}