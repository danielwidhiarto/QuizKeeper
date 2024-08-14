<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;
use App\Http\Middleware\RoleCheck;
use App\Http\Middleware\AuthCheck;

//Student Page
Route::get('/', [StudentController::class, 'showUploadForm']);
Route::post('/upload', [StudentController::class, 'upload'])->name('upload');

//Login Page
Route::get('/auth/login', function(){return view('Login');})->name('login');
Route::post('/auth/login', [AuthController::class, 'loginAccount'])->name('login');
Route::get('/auth/logout', [AuthController::class, 'logoutAccount'])->name('logout');

//Tutor Page
Route::get('/tutor/dashboard', [AuthController::class, 'homePage'])->name('tutor_dashboard')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Tutor');
Route::post('/tutor/dashboard/backup-all-files', [TutorController::class, 'backupToServer'])->name('backup_to_server')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Tutor');
Route::delete('/tutor/dashboard/delete-all-file/', [TutorController::class, 'deleteAll'])->name('delete_all')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Tutor');
Route::get('/tutor/dashboard/download-all-files', [TutorController::class, 'downloadAll'])->name('download_all')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Tutor');
Route::delete('/tutor/dashboard/delete-file/{id}', [TutorController::class, 'delete'])->name('delete')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Tutor');
Route::get('/tutor/dashboard/download-file/{id}', [TutorController::class, 'download'])->name('download')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Tutor');

//Admin Page
Route::get('/admin/dashboard/', [AuthController::class, 'homePage'])->name('admin_dashboard')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::get('admin/download/file/{id}', [AdminController::class, 'downloadBackupFiles'])->name('download_backup_file')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::delete('admin/delete/file/{id}', [AdminController::class, 'deleteBackupFiles'])->name('delete_backup_file')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
Route::get('/open-file-explorer/{id}', [AdminController::class, 'openFileExplorer'])->name('open_file_explorer')->middleware([AuthCheck::class])->middleware(RoleCheck::class.':Admin');
