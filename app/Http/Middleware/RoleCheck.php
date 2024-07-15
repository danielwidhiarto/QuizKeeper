<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if (in_array($role, $roles)) {
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
