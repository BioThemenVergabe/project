<?php

namespace App\Providers;

use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('uniqueUsers', function ($attributes, $value, $parameters, $validator) {
            $curUser = Auth::user();
            $user = NULL;
            if ($attributes == "matrnr") {
                if ($curUser->matrnr == $value)
                    return true;
                $user = User::where('matrnr', '=', $value)->get();
            } elseif ($attributes == "email") {
                if ($curUser->email == $value)
                    return true;
                $user = User::where('email', '=', $value)->get();
            }
            if (is_null($user) || count($user) == 0)
                return true;
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
