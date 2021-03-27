<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role == 'Admin')
            {
                return $next($request);
            }
            else
            {
                abort(403, 'Unauthorized action.');
            }        
        }
        else
        {
            abort(403, 'Login To Continue');
        }
    }
}
