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

Route::post('/hallo', function() {
   return response()->json(['success' => false ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', function() {
   Auth::logout();
});