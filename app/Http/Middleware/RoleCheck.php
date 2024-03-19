<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Get the user's role
            $role = Auth::user()->role;

            // Check if the user's role matches any of the allowed roles
            if (in_array($role, $roles)) {
                return $next($request);
            }
        }

        // If the user's role doesn't match or they're not logged in, redirect back
        return redirect()->back();
    }
}
