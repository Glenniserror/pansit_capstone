<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\StudentDashboardController;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('glenn.homepage');
});
/*-----------Login-----------*/

Route::prefix('student')->group(function () {
    // Login page
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    // Handle login POST
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
    // Handle signup POST
    Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register');
});

Route::prefix('teacher')->group(function () {
    // Login page
    Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
    // Handle login POST
    Route::post('/login', [TeacherAuthController::class, 'login'])->name('teacher.login.submit');
    // Handle signup POST
    Route::post('/register', [TeacherAuthController::class, 'register'])->name('teacher.register');
});

Route::prefix('admin')->group(function () {
    // Login page
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    // Handle login POST
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    // Handle signup POST
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
});

Route::get('/student/login', function() {
    return view('auth.student_login');
})->name('student.login');

Route::post('/student/login', [StudentAuthController::class, 'login'])
    ->name('student.login.submit');

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('student.dashboard');

