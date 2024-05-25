<?php

use App\Http\Controllers\Instructor\CouponController;
use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [InstructorController::class, 'index'])->name('dashboard');

Route::get('profile', [InstructorController::class, 'profile'])->name('profile');
Route::put('profile', [InstructorController::class, 'updateProfile'])->name('profile.update');

Route::put('change-password', [InstructorController::class, 'changePassword'])->name('change.password');

// Route::middleware('check-instructor-active')->group(function () {
//courses
Route::resource('courses', CoursesController::class);
Route::post('course/section', [CoursesController::class, 'addCourseSection'])->name('course.section');
Route::put('course/section/{section}', [CoursesController::class, 'updateCourseSection'])->name('course.section.update');
Route::delete('course/section/{section}', [CoursesController::class, 'deleteCourseSection'])->name('course.section.delete');
Route::post('course/lecture', [CoursesController::class, 'addCourseLecture'])->name('course.lecture');
Route::put('course/lecture/{id}/edit', [CoursesController::class, 'updateCourseLecture'])->name('course.lecture.update');
Route::delete('course/lecture/{id}', [CoursesController::class, 'deleteCourseLecture'])->name('course.lecture.delete');
//coupons
Route::resource('coupons', CouponController::class);

//orders
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('order/{id}/pdf', [OrderController::class, 'downloadPdf'])->name('order.pdf');
// });