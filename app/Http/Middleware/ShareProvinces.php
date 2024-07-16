<?php

namespace App\Http\Middleware;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareProvinces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Lấy danh sách các tỉnh
        $provinces = Cache::remember('provinces', 60*60*24, function () {
            return Province::all();
        });

        view()->share('provinces', $provinces);

        return $next($request);
    }
}
