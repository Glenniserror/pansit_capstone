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

/*----------- Admin Auth Routes -----------*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*----------- Student Auth Routes -----------*/
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])
        ->name('login');// Show login / signup page
    Route::post('/login', [StudentAuthController::class, 'login'])
        ->name('login.submit');// Handle login form
    Route::post('/register', [StudentAuthController::class, 'register'])
        ->name('register');// Handle signup form
    Route::post('/logout', [StudentAuthController::class, 'logout'])
        ->name('logout');// Logout
});

/*----------- Teacher Auth Routes -----------*/
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('login', [TeacherAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [TeacherAuthController::class, 'login']);
    Route::post('logout', [TeacherAuthController::class, 'logout'])->name('logout');
});