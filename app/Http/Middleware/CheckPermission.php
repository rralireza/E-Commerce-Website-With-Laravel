<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $permission): Response
    {
        if (! auth()->user()->role->hasPermission($permission)) {
            return redirect(route('registerOtp'))->withErrors(["You don't have permission for access to this option"]);
        }
        return $next($request);
    }
}
