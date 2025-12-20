<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('glenn.homepage');
});

Route::get('/login', function () {
    return view('student_login');
});
