<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
{
    $data = [
        'overallProgress' => 46,
        'quizzesCompleted' => '12/20',
        'currentStreak' => '7 days',
        'modules' => [
            [
                'name' => 'Sequences and Series',
                'progress' => 100,
                'completed' => true,
            ],
            [
                'name' => 'Polynomials and Polynomial Equations',
                'progress' => 0,
                'completed' => false,
            ],
            [
                'name' => 'Advanced Equations and Functions',
                'progress' => 0,
                'completed' => false,
            ],
        ],
    ];

    // Add this for debugging: It will stop the page and show the data
    dd($data);  // Remove this after testing

    return view('dashboard.student_dashboard', $data);
}
}



