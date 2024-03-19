<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\RoleCheck;

//Admin Login Page
Route::get('/', function(){return view('Admin.Login');})->name('admin_login');

//Admin Login Route
Route::post('/', [AdminController::class, 'adminLogin'])->name('admin_login');

//Admin Dashboard
Route::get('/dashboard', [AdminController::class, 'homeIndex'])->name('admin_dashboard')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');

Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin_logout');
