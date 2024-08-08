<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next, $role)
     {
        if ($request->user()->role === 'admin') {
            return $next($request);
        }
        
        if ($request->user()->role !== $role) {
            return redirect('/'); // hoặc trả về một thông báo lỗi
        }
         return $next($request);
     }
}
