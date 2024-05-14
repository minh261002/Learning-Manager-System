<?php

use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [InstructorController::class, 'index'])->name('dashboard');

Route::get('profile', [InstructorController::class, 'profile'])->name('profile');
Route::put('profile', [InstructorController::class, 'updateProfile'])->name('profile.update');

Route::put('change-password', [InstructorController::class, 'changePassword'])->name('change.password');

Route::resource('courses', CoursesController::class);
