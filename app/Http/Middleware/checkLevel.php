<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class checkLevel
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

        if(Auth::user()->userlevel == 0){
//            \Log::info('Userlevel is 0');
            return redirect()->back();
        }
//        \Log::info(Auth::user()->userlevel);
//        \Log::info('Userlevel is not 0');

        return $after;
    }
}
