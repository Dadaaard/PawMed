<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check if the authenticated user is a customer
        if (Auth::user()->usertype != 'Doctor') {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
