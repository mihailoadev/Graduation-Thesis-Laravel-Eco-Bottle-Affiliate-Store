<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class RedirectIfModerator
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            
            if (Auth::guard('admin')->user()->is_SuperAdmin == 0) {                
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
