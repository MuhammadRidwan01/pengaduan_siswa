<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {   try {
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }
    } catch (\Exception $e) {
        \Log::error('Error: '. $e->getMessage());
    }


        return redirect('/home')->with('error', 'Anda tidak memiliki akses.');
    }
}
