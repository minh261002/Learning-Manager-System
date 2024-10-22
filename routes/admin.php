<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('profile', [AdminController::class, 'profile'])->name('profile');
Route::put('profile', [AdminController::class, 'updateProfile'])->name('profile.update');

Route::put('change-password', [AdminController::class, 'changePassword'])->name('change.password');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

//category
Route::resource('categories', CategoryController::class);

//account
Route::resource('accounts', AccountController::class);
Route::get('account/change-status', [AccountController::class, 'changeStatus'])->name('accounts.change-status');

//course
Route::resource('courses', CourseController::class);
Route::get('course/change-status', [CourseController::class, 'changeStatus'])->name('courses.change-status');

//coupon
Route::resource('coupons', CouponController::class);

//order
Route::resource('orders', OrderController::class);
Route::put('order/change-status/{id}', [OrderController::class, 'changeStatus'])->name('orders.change-status');

//settings
Route::get('smtp', [SettingController::class, 'smtp'])->name('smtp');
Route::put('smtp', [SettingController::class, 'updateSmtp'])->name('smtp.update');

Route::get('site', [SettingController::class, 'siteSetting'])->name('site');
Route::put('site', [SettingController::class, 'updateSiteSetting'])->name('site.update');