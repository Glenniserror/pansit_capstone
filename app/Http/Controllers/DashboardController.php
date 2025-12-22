<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Static data for now. Replace with database queries later.
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

        return view('dashboard', $data);
    }
}