<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // Siguraduhin na teacher lang ang makakakita nito kahit naka-login
        if (Auth::user()->role !== 'teacher') {
            return redirect()->route('homepage')->with('error', 'Unauthorized access.');
        }

        return view('dashboard.teacher_dashboard'); // Siguraduhing tama ang folder path nito
    }
}