<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // checks if user is authenticated (loggedin) and its role is superadmin
        if (Auth::check() && Auth::user()->role == 's') {
            // tells the request to go through
            return $next($request);
        }

        // if not authenticated, redirect me to login page
        return redirect()->route('login');
    }
}
