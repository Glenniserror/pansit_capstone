<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Controllers
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\AdminDashboardController;

/*----------- Homepage -----------*/
Route::get('/', function () {
    return view('glenn.homepage');
})->name('homepage');

/*----------- GUEST ROUTES (Public) -----------*/
// Ang mga routes na ito ay accessible lang kung HINDI pa naka-login ang user.
Route::middleware('guest')->group(function () {
    
    // Student Auth
    Route::prefix('student')->group(function () {
        Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
        Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
        Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register');
    });

    // Teacher Auth
    Route::prefix('teacher')->group(function () {
        Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
        Route::post('/login', [TeacherAuthController::class, 'login'])->name('teacher.login.submit');
        Route::post('/register', [TeacherAuthController::class, 'register'])->name('teacher.register');
    });

    // Admin Auth
    Route::prefix('admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
        Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
    });
});

