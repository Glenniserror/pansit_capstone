<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ============ STUDENT ============
    public function showStudentLoginForm()
    {
        return view('auth.student-login');
    }

    public function studentLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if user is actually a student
            if ($user->role !== 'student') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'This account is registered as a ' . ucfirst($user->role) . '. Please use the ' . $user->role . ' login portal.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password. Please check your credentials or create a new account.',
        ])->onlyInput('email');
    }

    public function studentRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'This email is already registered. Please use a different email or login.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'student',
            ]);

            Auth::login($user);
            return redirect()->route('student.dashboard')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'An error occurred during signup. Please try again.'])->withInput();
        }
    }

    // ============ TEACHER ============
    public function showTeacherLoginForm()
    {
        return view('auth.teacher-login');
    }

    public function teacherLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if user is actually a teacher
            if ($user->role !== 'teacher') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'This account is registered as a ' . ucfirst($user->role) . '. Please use the ' . $user->role . ' login portal.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('teacher.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password. Please check your credentials or create a new account.',
        ])->onlyInput('email');
    }

    public function teacherRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'This email is already registered. Please use a different email or login.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'teacher',
            ]);

            Auth::login($user);
            return redirect()->route('teacher.dashboard')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'An error occurred during signup. Please try again.'])->withInput();
        }
    }

    // ============ ADMIN ============
    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if user is actually an admin
            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'This account is registered as a ' . ucfirst($user->role) . '. Please use the ' . $user->role . ' login portal.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password. Please check your credentials or contact the administrator.',
        ])->onlyInput('email');
    }

    public function adminRegister(Request $request)
    {
        return back()->withErrors([
            'email' => 'Admin registration is not allowed. Contact the system administrator.',
        ]);
    }

    // ============ LOGOUT ============
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
