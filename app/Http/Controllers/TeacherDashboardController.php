<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // Stats na naka-zero muna base sa screenshot mo
        $stats = [
            'total_students'   => 0,
            'avg_progress'     => 0,
            'pending_reviews'  => 0,
            'messages'         => 0
        ];

        // Empty array dahil wala pang student activity
        $recent_activity = [];

        return view('teacher.dashboard', compact('stats', 'recent_activity'));
    }
}