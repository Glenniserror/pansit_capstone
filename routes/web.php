<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Auth\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('glenn.homepage');
});

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/
Route::prefix('student')->group(function () {
    // Login page
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    // Handle login POST
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
    // Handle signup POST
    Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register');
});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/
Route::prefix('teacher')->group(function () {
    // Login page
    Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
    // Handle login POST
    Route::post('/login', [TeacherAuthController::class, 'login'])->name('teacher.login.submit');
    // Handle signup POST
    Route::post('/register', [TeacherAuthController::class, 'register'])->name('teacher.register');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Login page
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    // Handle login POST
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    // Handle signup POST
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
});
