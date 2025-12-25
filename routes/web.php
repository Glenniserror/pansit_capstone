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


// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    // ================= GUEST ROUTES =================
    Route::middleware('guest:student')->group(function () {
        // Login form
        Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
        // Handle login
        Route::post('/login', [StudentAuthController::class, 'login'])->name('login.submit');
        // Registration form
        Route::get('/register', [StudentAuthController::class, 'showRegisterForm'])->name('register');
        // Handle registration
        Route::post('/register', [StudentAuthController::class, 'register'])->name('register.submit');
    });
    // ================= AUTHENTICATED ROUTES =================
    Route::middleware('auth:student')->group(function () {
        // Dashboard
        Route::get('/dashboard', function () {
            return view('dashboard.student_dashboard');
        })->name('dashboard');
        // Logout
        Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');
    });
});

// TEACHER ROUTES
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Guest only
    Route::middleware('guest:teacher')->group(function () {
        Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [TeacherAuthController::class, 'login'])->name('login.submit');
        Route::post('/register', [TeacherAuthController::class, 'register'])->name('register');
    });
    // Protected
    Route::middleware('auth:teacher')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.teacher_dashboard');
        })->name('dashboard');
        
        Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('logout');
    });
});

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest only
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
        Route::post('/register', [AdminAuthController::class, 'register'])->name('register');
    });
    // Protected
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.admin_dashboard');
        })->name('dashboard');
        
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

