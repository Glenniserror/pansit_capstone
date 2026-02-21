<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\AdminDashboardController;


/*----------- Homepage -----------*/
Route::get('/', function () {
    return view('glenn.homepage');
})->name('homepage');


// ============ STUDENT ROUTES ============
Route::prefix('student')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showStudentLoginForm'])->name('student.login');
    Route::post('/login', [AuthController::class, 'studentLogin'])->name('student.login.submit');
    
    // Register
    Route::post('/register', [AuthController::class, 'studentRegister'])->name('student.register');
    
    // Dashboard (Protected)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('student.logout');
    });
});

// ============ TEACHER ROUTES ============
Route::prefix('teacher')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showTeacherLoginForm'])->name('teacher.login');
    Route::post('/login', [AuthController::class, 'teacherLogin'])->name('teacher.login.submit');
    
    // Register
    Route::post('/register', [AuthController::class, 'teacherRegister'])->name('teacher.register');
    
    // Dashboard (Protected)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('teacher.logout');
    });
});

// ============ ADMIN ROUTES ============
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'adminLogin'])->name('admin.login.submit');
    
    // Register
    Route::post('/register', [AuthController::class, 'adminRegister'])->name('admin.register');
    
    // Dashboard (Protected)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
