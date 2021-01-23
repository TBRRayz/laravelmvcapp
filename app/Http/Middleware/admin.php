<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use const http\Client\Curl\AUTH_ANY;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::check() && \Auth::user()->admin()) {
            return $next($request);
        }
        return redirect('login');
    }
}
