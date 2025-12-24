<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    // Ipinapakita ang login page ng teacher
    public function showLoginForm() 
    { 
        return view('login/teacher_login'); 
    }

    // Process ng login
    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email', 
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role === 'teacher') {
            $request->session()->regenerate();
            return redirect()->route('teacher.dashboard');
        }

        // Kung mali ang credentials o hindi teacher ang role, i-logout at mag-error
        Auth::logout();
        return back()->withErrors(['email' => 'Invalid teacher credentials.']);
    }

    // Process ng logout (Dinagdag para maging katulad ng sa student)
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('teacher.login');
    }
}