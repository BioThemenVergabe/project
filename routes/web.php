<?php

use App\Welcome;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'language'], function () {

    Route::match(['get', 'post'], '/', function () {

        /*
         * Weiterleitung, wenn SSL vorhanden ist.
         *
         * if(!Request::secure())
         *   return redirect(env('APP_URL'));
         */
        if (Auth::check())
            return redirect('/dashboard');

        return view('welcome', [
            'welcome' => Welcome::find(1)
        ]);

    });

    Route::get('/lang/{key}', function ($key) {
        session()->put('locale', $key);
        return redirect()->back();
    });

    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/redirect', function () {
            if (Auth::user()->userlevel == 0)
                return redirect('/dashboard');
            else
                return redirect('/admin');
        });

        /*
         * User-Routes
         */
        {
            Route::match(['get', 'post'], '/dashboard', function () {
                return view('dashboard');
            });

            Route::get('/profile/edit', function () {
                return view('edit_user');
            });

            Route::post('/profile/save', function () {
                return redirect('/dashboard');
            });

            Route::get('/wahl', function () {
                return view('wahl');
            });

            Route::get('/logout', function () {
                Auth::logout();
                return redirect('/');
            });
        }

        /*
         * Admin-Routes
         */
        Route::group(['middleware' => 'checkLevel'], function () {

            Route::match(['get', 'post'], '/admin', function () {
                return view('admin_dashboard');
            });

            Route::get('/admin_AG', function () {
                return view('admin_AG');
            });

            Route::match(['get', 'post'], '/admin_studenten', function () {
                return view('admin_studenten');
            });

            Route::get('/admin_studenten_bearbeiten', function () {
                return view('admin_studenten_bearbeiten');
            });
        });

    });


});