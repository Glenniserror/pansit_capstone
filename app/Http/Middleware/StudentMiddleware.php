<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. I-check kung ang user ay naka-login (Auth::check)
        // 2. I-check kung ang 'role' ng user ay 'student'
        // Gagamit tayo ng ?-> para iwas error kung null ang user
        if (Auth::check() && Auth::user()?->role === 'student') {
            return $next($request);
        }

        // Kung hindi student o hindi naka-login, ibalik sa home page
        return redirect('/')->with('error', 'Access Denied. Students only.');
    }
}