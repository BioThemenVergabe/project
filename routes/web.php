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

        //wenn Benutzer schon angemeldet ist, und Cookie gesetzt hat, dann wird er direkt weitergeleitet
        if (Auth::check()) {
            if (Auth::user()->userlevel == 0)
                return redirect('/dashboard');
            else
                return redirect('/admin');
        }

        //ansonsten bekommt er die Startseite
        return view('welcome', [
            'welcome' => Welcome::find(1)
        ]);

    });

    //Sprache ändern
    Route::get('/lang/{key}', function ($key) {
        session()->put('locale', $key);
        return redirect()->back();
    });

    Auth::routes();

    //Auf alles nachfolgende dürfen nur authorisierte Nutzer zugreifen
    Route::group(['middleware' => 'auth'], function () {

        //nach login je nach userlevel weiterleiten
        Route::get('/redirect', function () {
            if (Auth::user()->userlevel == 0)
                return redirect('/dashboard');
            else
                return redirect('/admin');
        });

        /*
         * User-Routes
         *
         * Middleware checkAdmin leitet Admin auf /admin weiter um Ansichten beider User explizit zu trennen.
         * TODO: Testen!
         */
        Route::group(['middleware' => 'checkAdmin'], function () {
            Route::match(['get', 'post'], '/dashboard', 'UserController@show');

            Route::get('/profile/edit', 'UserController@edit');

            Route::get('/wahl', function () {
                return view('wahl');
            });

            Route::get('/logout', function () {
                Auth::logout();
                return redirect('/');
            });
        });

        /*
         * Admin-Routes
         */
        //Middleware checklevel verweigert Zugriff für normale Benutzer. Nur Admin darf auf folgende Seiten zugreifen
        Route::group(['middleware' => 'checkLevel'], function () {

            Route::match(['get', 'post'], '/admin', 'admin\dashboardController@showDashboard');

            Route::get('/admin_AG', function () {
                return view('admin_AG');
            });

            Route::get('/admin_studenten', 'admin\studentController@showStudents');
            Route::post('/admin_studenten', 'admin\studentController@saveStudent');

            Route::get('/admin_studenten_bearbeiten', 'admin\studentController@editStudent');

            Route::get('/studenten_delete', 'admin\studentController@deleteStudent');
        });
    });
});