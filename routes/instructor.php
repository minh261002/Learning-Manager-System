<?php

use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [InstructorController::class, 'index'])->name('dashboard');

Route::get('profile', [InstructorController::class, 'profile'])->name('profile');
Route::put('profile', [InstructorController::class, 'updateProfile'])->name('profile.update');

Route::put('change-password', [InstructorController::class, 'changePassword'])->name('change.password');

//courses
Route::resource('courses', CoursesController::class);
Route::get('course/change-status', [CoursesController::class, 'changeCourseStatus'])->name('course.change.status');
Route::post('course/section', [CoursesController::class, 'addCourseSection'])->name('course.section');
Route::put('course/section/{section}', [CoursesController::class, 'updateCourseSection'])->name('course.section.update');
Route::delete('course/section/{section}', [CoursesController::class, 'deleteCourseSection'])->name('course.section.delete');
Route::post('course/lecture', [CoursesController::class, 'addCourseLecture'])->name('course.lecture');