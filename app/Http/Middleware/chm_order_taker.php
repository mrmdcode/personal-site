<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class chm_order_taker
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
        if (auth()->user()->type != "order-taker"){
            return abort(403);
        }
        return $next($request);
    }
}
