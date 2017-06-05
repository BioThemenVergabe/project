<?php

namespace App\Http\Middleware;

use Closure;
use App\Option;

class Language
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
        if(session()->has('locale'))
            app()->setLocale(session('locale'));
        app()->setLocale(config('app.locale'));

        if(app()->getLocale() == 'en')
            session()->put('welcome',Option::find(1)->WelcomeEN);
        else
            session()->put('welcome',Option::find(1)->WelcomeDE);

        return $next($request);
    }
}
