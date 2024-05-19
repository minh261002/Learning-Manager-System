<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
Route::get('/course/{slug}', [FrontendController::class, 'course_detail'])->name('course.detail');
Route::get('/teachers', [FrontendController::class, 'teachers'])->name('teacher.show');

//auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/password/forgot', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::get('/password/reset/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/change-password', [UserController::class, 'changePassword'])->name('change.password');

    Route::resource('wishlist', WishListController::class)->only(['index', 'store', 'destroy']);

    Route::get('/wishlist', [WishListController::class, 'index'])->name('whishlist');

    Route::resource('cart', CartController::class);

    Route::get('cart/mini-cart/get', [CartController::class, 'getMiniCart'])->name('cart.mini');
    Route::delete('cart/remove/all', [CartController::class, 'clear'])->name('cart.clear');
});

//location ajax
Route::get('location/provinces', [LocationController::class, 'getProvinces']);
Route::get('location/districts/{provinceCode}', [LocationController::class, 'getDistricts']);
Route::get('location/wards/{districtCode}', [LocationController::class, 'getWards']);

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');