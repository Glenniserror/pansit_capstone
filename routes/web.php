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


// Student ROUTES
Route::prefix('student')->name('student.')->group(function () {
    // Guest only
    Route::middleware('guest:student')->group(function () {
        Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [StudentAuthController::class, 'login'])->name('login.submit');
        Route::post('/register', [StudentAuthController::class, 'register'])->name('register');
    });
    // Protected
    Route::middleware('auth:student')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.student_dashboard');
        })->name('dashboard');
        
        Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');
    });
    // Show login form
Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
// Handle login submission
Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
// Show registration form (optional if you allow signup)
Route::get('/student/register', [StudentAuthController::class, 'showRegisterForm'])->name('student.register');
// Handle registration
Route::post('/student/register', [StudentAuthController::class, 'register']);
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

