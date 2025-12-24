<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import para ma-access ang listahan ng users kung kailangan

class AdminDashboardController extends Controller
{
    /**
     * Ipakita ang Dashboard para sa Admin.
     */
    public function index()
    {
        // Siguraduhin na ang naka-login ay Admin talaga
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'Unauthorized access for non-admins.']);
        }

        $user = Auth::user();
        
        // Halimbawa: Kunin ang bilang ng lahat ng users para sa admin stats
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();

        return view('admin.dashboard', compact('user', 'totalStudents', 'totalTeachers'));
    }
}