<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $gurards = 'customer')
    {
        if(!Auth::guard($gurards)->check())
        {
            return redirect()->route('home')->with('error-checkout', "Vui lòng đăng nhập để thanh toán");
        }
        return $next($request);
    }
}
