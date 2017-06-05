<?php

use App\Welcome;
use App\Option;

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
            'welcome' => Welcome::find(1),
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


        Route::get('/logout', function () {
            Auth::logout();
            return redirect('/');
        });
        /*
         * User-Routes
         *
         * Middleware checkAdmin leitet Admin auf /admin weiter um Ansichten beider User explizit zu trennen.
         */
        Route::group(['middleware' => 'checkAdmin'], function () {
            Route::match(['get', 'post'], '/dashboard', 'UserController@show');

            Route::post('/profile/save','UserController@update');

            Route::get('/profile/edit', 'UserController@edit');

            Route::resource('/wahl', 'RatingController');

            Route::post('/upload','UserController@storeUpload');

        });

        /*
         * Admin-Routes
         */
        //Middleware checklevel verweigert Zugriff für normale Benutzer. Nur Admin darf auf folgende Seiten zugreifen
        Route::group(['middleware' => 'checkLevel'], function () {

            Route::match(['get', 'post'], '/admin', 'admin\dashboardController@showDashboard');
            Route::post('/admin_delete_ratings', 'admin\dashboardController@deleteRatings');
            Route::post('/admin_delete_assignments', 'admin\dashboardController@deleteAssignments');
            Route::post('/admin_end_election', 'admin\dashboardController@checkAdmin');
            Route::post('/admin_start_algo', 'admin\dashboardController@startAlgo');
            Route::post('/admin_start_algo', 'admin\dashboardController@startAlgo');
            Route::get('/admin_toggleOpened1', 'admin\dashboardController@toggleOpened1');
            Route::get('/admin_toggleOpened2', 'admin\dashboardController@toggleOpened2');

            Route::get('/admin_studenten', 'admin\studentController@showStudents');
            Route::post('/admin_studenten', 'admin\studentController@saveStudent');
            Route::get('/admin_studenten_bearbeiten', 'admin\studentController@editStudent');
            Route::get('/admin_studenten_search', 'admin\studentController@searchStudents');
            Route::post('/admin_sb_save', 'admin\studentController@saveRating');
            Route::get('/admin_get_ratings', 'admin\studentController@getRating');
            Route::get('/studenten_delete', 'admin\studentController@deleteStudent');

            Route::get('/admin_AG', 'admin\workgroupController@showGroups');
            Route::get('/admin_AG_delete', 'admin\workgroupController@deleteGroup');
            Route::get('/admin_AG_search', 'admin\workgroupController@searchGroups');
            Route::post('/admin_AG_save', 'admin\workgroupController@saveGroups');


        });

    });
});