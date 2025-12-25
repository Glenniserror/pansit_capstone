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
        Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');// Login form
        Route::post('/login', [StudentAuthController::class, 'login'])->name('login.submit'); // Handle login
        Route::get('/register', [StudentAuthController::class, 'showRegisterForm'])->name('register');// Registration form
        Route::post('/register', [StudentAuthController::class, 'register'])->name('register.submit');// Handle registration
    });
    // ================= AUTHENTICATED ROUTES =================
    Route::middleware('auth:student')->group(function () {
        Route::get('/dashboard', function () {// Dashboard
            return view('dashboard.student_dashboard');
        })->name('dashboard');
        Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');// Logout
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

