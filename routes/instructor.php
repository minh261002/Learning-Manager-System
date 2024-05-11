<?php

use App\Http\Controllers\Instructor\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [InstructorController::class, 'index'])->name('dashboard');
Route::get('profile', [InstructorController::class, 'profile'])->name('profile');
Route::put('profile', [InstructorController::class, 'updateProfile'])->name('profile.update');
