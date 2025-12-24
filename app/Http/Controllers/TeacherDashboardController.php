<?php

namespace App\Http\Controllers;

class TeacherDashboardController extends Controller
{
    public function index() {
        $stats = ['total_students' => 0, 'avg_progress' => 0, 'pending_reviews' => 0, 'messages' => 0];
        return view('teacher.dashboard', compact('stats'));
    }
}