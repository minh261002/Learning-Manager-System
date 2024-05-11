<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
Route::get('/course/aa', [FrontendController::class, 'course_detail'])->name('course.detail');
Route::get('/teachers', [FrontendController::class, 'teachers'])->name('teacher.show');

//auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/password/forgot', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::get('/password/reset/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});

//location ajax
Route::get('location/provinces', [LocationController::class, 'getProvinces']);
Route::get('location/districts/{provinceCode}', [LocationController::class, 'getDistricts']);
Route::get('location/wards/{districtCode}', [LocationController::class, 'getWards']);
