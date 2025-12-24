<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Ipinapakita ang login form para sa Admin
    public function showLoginForm() 
    { 
        return view('login/admin_login'); 
    }

    // Process ng login para sa Admin
    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Tinitingnan kung tama ang credentials at kung ang role ay 'admin'
        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Logout agad kung hindi admin o mali ang password para iwas unauthorized access
        Auth::logout();
        return back()->withErrors(['email' => 'Invalid admin credentials.']);
    }

    // Process ng logout para sa Admin
    public function logout(Request $request) 
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }
}