<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class Ceklevel
{
    /**
     * 
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // if (!$user->is_verified) {
        //     return redirect()->route('verify.form');
        // }

        foreach ($roles as $role) {
            if ($user->role == $role) {
                return $next($request);
            }
        }

        switch ($user->role) {
            case 1:
                return redirect()->route('dashboard.index');
            case 2:
                return redirect()->route('user.index');
            default:
                return redirect()->route('unauthorized'); 
        }
    }
}