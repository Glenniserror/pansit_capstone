<?php

namespace App\Http\Controllers;

class TeacherDashboardController extends Controller
{
    public function index() {
        return view('dashboard/teacher_dashboard');
    }
}