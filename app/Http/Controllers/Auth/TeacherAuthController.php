<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.teacher_login');
    }

    public function login(Request $request)
    {
        // 1. Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Credentials
        // TANGGALIN ang 'role' dito kung wala kang 'role' column sa 'students' table sa database
        $credentials = $request->only('email', 'password');

        // 3. Authentication Attempt
        // Siguraduhin na ang 'student' guard ay defined sa config/auth.php
        if (Auth::guard('teacher')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('teacher.dashboard'));
        }

        // 4. Fail handling
        return back()->withErrors([
            'email' => 'The provided credentials do not match our student records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('teacher.login');
    }
}