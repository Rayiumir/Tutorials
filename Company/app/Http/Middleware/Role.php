<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!Auth::check()){
            abort(403, 'ابتدا وارد سایت شوید!');
        }

        $userRole = Auth::user()->role;

        if($userRole === 'admin'){
            return $next($request);
        }

        if(!in_array($userRole, $roles)){
            abort(403, 'شما اجازه دسترسی به این بخش را ندارید!');
        }

        return $next($request);
    }
}
