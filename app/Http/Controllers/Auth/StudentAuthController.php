<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function showLoginForm() { 
        return view('login.student_login'); 
    }

    public function showRegistrationForm() {
        return view('auth.student_register'); 
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
            'role' => 'student', 
        ]);

        Auth::login($user);

        return redirect()->route('student.dashboard');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role === 'student') {
            $request->session()->regenerate();
            return redirect()->route('dashboard.student_dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Invalid student credentials.']);
    }

    /**
     * FIXED: Pagkatapos mag-logout, ibabalik ang user sa homepage.
     */
    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Dito binago mula student.login patungong homepage
        return redirect()->route('homepage'); 
    }
}