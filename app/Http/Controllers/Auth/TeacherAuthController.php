<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherAuthController extends Controller
{
    public function showLoginForm() { 
        return view('login.teacher_login'); 
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role === 'teacher') {
            $request->session()->regenerate(); // Mahalaga para iwas 419 error
            return redirect()->route('teacher.dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Invalid teacher credentials.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homepage'); 
    }
}