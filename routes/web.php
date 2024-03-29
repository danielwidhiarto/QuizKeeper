<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IPAddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\RoleCheck;
use App\Http\Controllers\FileController;

Route::get('/', [FileController::class, 'showUploadForm']);
Route::post('/upload', [FileController::class, 'upload'])->name('upload');

//Admin Login Page
Route::get('/auth/login', function(){return view('Admin.Login');})->name('admin_login');

//Admin Login Route
Route::post('/auth/login', [AdminController::class, 'adminLogin'])->name('admin_login');

//Admin Dashboard
Route::get('/dashboard', [AdminController::class, 'homeIndex'])->name('admin_dashboard')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');

Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin_logout');

Route::get('/ip', [IPAddressController::class, 'showIP']);

