<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index() {
        $counts = [
            'teachers' => User::where('role', 'teacher')->count(),
            'students' => User::where('role', 'student')->count(),
            'total' => User::count()
        ];
        $users = User::all();
        return view('admin.dashboard', compact('counts', 'users'));
    }
}