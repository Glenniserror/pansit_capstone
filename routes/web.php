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
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('login.submit');
    Route::post('/register', [AdminAuthController::class, 'register'])
        ->name('register'); // signup submit
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('logout');
});

/*----------- Student Auth Routes -----------*/
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])
        ->name('login'); // login / signup page
    Route::post('/login', [StudentAuthController::class, 'login'])
        ->name('login.submit'); // login submit
    Route::post('/register', [StudentAuthController::class, 'register'])
        ->name('register'); // signup submit
    Route::post('/logout', [StudentAuthController::class, 'logout'])
        ->name('logout');
});

/*----------- Teacher Auth Routes -----------*/
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [TeacherAuthController::class, 'login'])
        ->name('login.submit');
    Route::post('/register', [TeacherAuthController::class, 'register'])
        ->name('register'); // signup submit
    Route::post('/logout', [TeacherAuthController::class, 'logout'])
        ->name('logout');
});
