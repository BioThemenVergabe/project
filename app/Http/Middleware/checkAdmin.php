<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class checkAdmin
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
        $after = $next($request);

        if(Auth::user()->userlevel > 0){
            return redirect('/admin');
        }
//        \Log::info('Userlevel is not 0');

        return $after;
    }
}
