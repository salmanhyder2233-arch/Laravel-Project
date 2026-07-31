<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPassword
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('admin_ok') !== true) {
            return redirect('/admin-login');
        }

        return $next($request);
    }
}