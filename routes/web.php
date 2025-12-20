<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;

Route::get('/', function () {
    return view('glenn.homepage');
});

// Student login page
Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');

// Handle login POST
Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.submit');

// Handle signup POST
Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register');


// Teacher login page
Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');

// Handle login POST
Route::post('/login', [TeacherAuthController::class, 'login'])->name('teacher.login.submit');

// Handle signup POST
Route::post('/register', [TeacherAuthController::class, 'register'])->name('teacher.register');
