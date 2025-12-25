<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    /**
     * Ipakita ang login form para sa mga estudyante.
     */
    public function showLoginForm()
    {
        return view('login.student_login');
    }

    /**
     * I-handle ang login request gamit ang 'student' guard.
     */
    public function login(Request $request)
    {
        // 1. I-validate ang input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Kunin ang credentials
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => 'student', // Siguraduhin na may 'role' column ang students table mo
        ];

        // 3. Subukang i-authenticate gamit ang 'student' guard
        if (Auth::guard('student')->attempt($credentials)) {
            // Pag successful, i-regenerate ang session para sa security
            $request->session()->regenerate();

            // I-redirect sa student dashboard
            return redirect()->route('student.dashboard');
        }

        // 4. Kapag fail, bumalik sa login page na may error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our student records.',
        ])->onlyInput('email');
    }

    /**
     * I-log out ang estudyante.
     */
    public function logout(Request $request)
    {
        // I-logout ang user sa student guard
        Auth::guard('student')->logout();

        // Linisin ang session data
        $request->session()->invalidate();

        // I-regenerate ang CSRF token para sa security
        $request->session()->regenerateToken();

        // I-redirect pabalik sa login page ng student
        return redirect()->route('student.login');
    }
}