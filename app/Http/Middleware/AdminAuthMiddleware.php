<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // First check: User must be authenticated
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors(['message' => 'Please login to continue.']);
        }
        
        // Second check: User must be admin
        if (Auth::user()->is_admin !== 1) {
            abort(403, 'Access denied. Admin privileges required.');
        }
        
        return $next($request);
    }
}