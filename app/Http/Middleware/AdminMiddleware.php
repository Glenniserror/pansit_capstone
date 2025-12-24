<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Tinitiyak kung ang user ay naka-login at kung ang role ay 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Kung hindi admin, ibabalik sa homepage na may error message
        return redirect('/')->with('error', 'Access Denied. Admins only.');
    }
}