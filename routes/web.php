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

/*----------- Student Routes -----------*/
Route::prefix('student')->group(function () {
    // Auth
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
    Route::get('/register', [StudentAuthController::class, 'showRegistrationForm'])->name('student.register');
    Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register.submit');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

    // Dashboard (Protektado ng Auth)
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard')->middleware('auth');
});

/*----------- Teacher Routes -----------*/
Route::prefix('teacher')->group(function () {
    // Auth 
    Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('/login', [TeacherAuthController::class, 'login'])->name('teacher.login.submit');
    Route::get('/register', [TeacherAuthController::class, 'showRegistrationForm'])->name('teacher.register.form');
    Route::post('/register', [TeacherAuthController::class, 'register'])->name('teacher.register'); 
    Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('teacher.logout');

    // Dashboard (Protektado ng Auth)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    });
});

/*----------- Admin Routes -----------*/
Route::prefix('admin')->group(function () {
    // Auth
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Dashboard (Protektado ng Auth)
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
});