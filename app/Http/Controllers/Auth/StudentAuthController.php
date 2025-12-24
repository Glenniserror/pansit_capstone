<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Siguraduhing naka-import ang User model
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function showLoginForm() { 
        return view('login.student_login'); 
    }

    // --- DAGDAG NA REGISTER METHODS ---

    public function showRegistrationForm() {
        return view('auth.student_register'); // Siguraduhing mayroon kang ganitong view file
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student', // Awtomatikong 'student' ang role
        ]);

        Auth::login($user);

        return redirect()->route('student.dashboard');
    }

    // --- END NG REGISTER METHODS ---

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role === 'student') {
            $request->session()->regenerate();
            return redirect()->route('student.dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Invalid student credentials.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('student.login');
    }
}