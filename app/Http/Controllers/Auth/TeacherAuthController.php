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

    public function showRegistrationForm() {
        return view('auth.teacher_register'); 
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
            'role' => 'teaher', 
        ]);

        Auth::login($user);

        return redirect()->route('teacher.dashboard');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role === 'teacher') {
            $request->session()->regenerate();
            return redirect()->route('teacher.dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Invalid teacher credentials.']);
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