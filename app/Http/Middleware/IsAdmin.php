<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use App\Http\Authenticated;
class IsAdmin
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
        // dd(\Auth::user());
        if(\Auth::user()->role != 1) {
            return redirect('/');
        }
        return $next($request);
    }
}
