<?php

namespace App\Http\Middleware;

use App\Models\Wishlist;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckWishlist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::id())
                ->with(['product.variants.color', 'product.variants.size', 'product.images'])
                ->get();

            // Chia sẻ biến với view
            view()->share('wishlists', $wishlists);
        }

        return $next($request);
    }
}
