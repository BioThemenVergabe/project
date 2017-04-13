<?php

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

Route::get('/', function () {
    App::setLocale('de');
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::post('/dashboard', function() {
   return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', function() {
   Auth::logout();
});


/*
 * Mathias Routes
 */

Route::get('/admin', function () {
    return view('admin_dashboard');
});

Route::get('/admin_AG', function () {
    return view('admin_AG');
});

Route::get('/admin_studenten', function () {
    return view('admin_studenten');
});

Route::get('/admin_studenten_bearbeiten', function () {
    return view('admin_studenten_bearbeiten');
});