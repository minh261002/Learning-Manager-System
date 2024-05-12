<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::resource('categories', CategoryController::class);