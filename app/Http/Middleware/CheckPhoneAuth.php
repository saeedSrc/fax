<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPhoneAuth
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
        if (Auth::check())  {
            if(Auth::user()->pages == null) {
                return redirect('/phone_authorize'); // not phone authorize
            } else {
                return $next($request); // final authorize
            }
        } else {
            return redirect('/login'); // not  authorize
        }
    }
}
