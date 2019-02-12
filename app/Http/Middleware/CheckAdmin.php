<?php

namespace App\Http\Middleware;

use Closure;
use App\Grade;
use App\User;
use Auth;

class CheckAdmin
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
        if (Auth::check() && Auth::user()->role === 'admin') 
        {
        return $next($request);
        }
        else {

        return back()->withErrors(['Je bent niet bevoegd om op deze pagina te komen']);

        }
    }
}
