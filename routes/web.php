<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\NotificationController;
use App\Http\Controllers\User\QuestionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
Route::get('/course/{slug}', [FrontendController::class, 'course_detail'])->name('course.detail');
Route::get('/instructor/info/{username}', [FrontendController::class, 'instructor'])->name('info');

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
    Route::get('ajax/cart/data', [CartController::class, 'cartData'])->name('cart.data');

    Route::get('cart/mini-cart/get', [CartController::class, 'getMiniCart'])->name('cart.mini');
    Route::delete('cart/remove/all', [CartController::class, 'clear'])->name('cart.clear');

    Route::post('course/buy-now', [CartController::class, 'buyNow'])->name('course.buy-now');

    Route::post('coupon/apply', [CartController::class, 'applyCoupon'])->name('coupon.apply');
    Route::delete('coupon/remove', [CartController::class, 'removeCoupon'])->name('coupon.remove');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('course/view/{slug}', [FrontendController::class, 'view_course'])->name('course.view')->middleware('check-course-payment');

    Route::get('question/get-by-lecture', [QuestionController::class, 'getQuestionByLecture'])->name('question.get-by-lecture');
    Route::post('question/create', [QuestionController::class, 'createQuestion'])->name('question.create');
});

//location ajax
Route::get('location/provinces', [LocationController::class, 'getProvinces']);
Route::get('location/districts/{provinceCode}', [LocationController::class, 'getDistricts']);
Route::get('location/wards/{districtCode}', [LocationController::class, 'getWards']);

//search ajax
Route::get('search', [FrontendController::class, 'search'])->name('search');

//payment
Route::get('payment/vnpay', [CheckoutController::class, 'paymentVNPay'])->name('payment.vnpay');
Route::get('payment/vnpay/callback', [CheckoutController::class, 'handleVNPayCallback'])->name('payment.vnpay.callback');
Route::get('payment/paypal', [CheckoutController::class, 'paymentPaypal'])->name('payment.paypal');
Route::get('payment/paypal/callback', [CheckoutController::class, 'handlePaypalCallback'])->name('payment.paypal.callback');

//notification
Route::get('notification/get', [NotificationController::class, 'getNotification'])->name('notifications.get');