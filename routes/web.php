<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\RoleCheck;
use App\Http\Controllers\FileController;

Route::get('/', [FileController::class, 'showUploadForm']);
Route::post('/upload', [FileController::class, 'upload'])->name('upload');

//Admin Login Page
Route::get('/auth/login', function(){return view('Login');})->name('admin_login');

//Admin Login Route
Route::post('/auth/login', [AdminController::class, 'adminLogin'])->name('admin_login');

//Admin Dashboard
Route::get('/dashboard', [AdminController::class, 'homeIndex'])->name('admin_dashboard')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::get('/dashboard/SuperAdmin', [AdminController::class, 'homeIndex'])->name('superAdmin_dashboard')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':SuperAdmin');
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin_logout');

//Files
Route::delete('/dashboard/delete-file/{id}', [FileController::class, 'deleteFile'])->name('delete_file')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::get('/dashboard/download-file/{id}', [FileController::class, 'downloadFile'])->name('download_file')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::delete('/dashboard/delete-all-file/', [FileController::class, 'deleteAllFile'])->name('delete_all_files')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::get('/dashboard/download-all-files', [FileController::class, 'downloadAllFiles'])->name('download_all_files')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::post('/dashboard/backup-all-files', [FileController::class, 'backupAllFiles'])->name('backup_all_files')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');

//Download Backup File SuperAdmin
Route::get('/download/file/{id}', [FileController::class, 'downloadBackupFiles'])->name('download_backup_file')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':SuperAdmin');

