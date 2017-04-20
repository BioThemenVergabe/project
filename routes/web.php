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

Route::match(['get','post'],'/', function () {
    if(!Request::secure())
        return redirect(env('APP_URL'));
    if(Auth::check())
        return redirect('/dashboard');
    return view('welcome');
})->middleware('language');

Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
})->middleware('language');


Route::get('/profile/edit', function() {
    return view('edit_user');
})->middleware('language');

Route::post('/profile/save', function() {
    return redirect('/dashboard');
});

Route::get('/wahl', function() {
   return view('wahl');
})->middleware('language');

/*
 * routes for storing the lang-key.
 */
Route::get('/lang/{key}', function($key) {
    // session()->put('locale',$key);
    return redirect()->back();
})->middleware('language');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', function() {
   Auth::logout();
   return redirect('/');
});


/*
 * Mathias Routes
 */

Route::match(['get','post'],'/admin', function () {
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