<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;

class SellerCustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null(auth()->user()->phone) 
            && is_null(auth()->user()->store_name) 
            && is_null(auth()->user()->location)
            && is_null(auth()->user()->product_type)){
            return \redirect()->route('seller/customer-register');
        }
        return $next($request);
    }
}
