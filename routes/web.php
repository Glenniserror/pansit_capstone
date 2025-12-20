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
