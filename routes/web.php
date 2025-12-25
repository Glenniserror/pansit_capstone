<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Controllers
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Auth\AdminAuthController;

/*----------- Homepage -----------*/
Route::get('/', function () {
    return view('glenn.homepage');
})->name('homepage');

/*========== STUDENT ==========*/
Route::prefix('student')->name('student.')->group(function () {
    // Authentication routes
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [StudentAuthController::class, 'register'])->name('register');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');
    // Dashboard (protected)
    Route::middleware(['auth:student'])->group(function () {
        Route::get('/dashboard', fn () => view('student.dashboard'))->name('dashboard');
    });
});

/*========== TEACHER ==========*/
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Authentication routes
    Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [TeacherAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('logout');
    // Dashboard (protected)
    Route::middleware(['auth:teacher'])->group(function () {
        Route::get('/dashboard', fn () => view('teacher.dashboard'))->name('dashboard');
    });
});

/*========== ADMIN ==========*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    // Dashboard (protected)
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    });
});