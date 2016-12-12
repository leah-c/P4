<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    //return view('home');
    return view('index');

});
*/
# Direct user to the Expense Tracker landing page
Route::get('/', 'IndexController@index')->name('expense_tracker.index');
/*
# Direct user to the Generator tools landing page
Route::get('/', 'DEVBFF@home')->name('gen_home.index');

# Direct user to the ipsum text generator landing page
Route::get('/generate_ipsum', 'DEVBFF@ipsumHome')->name('gen_ipsum.index');

# Direct user to the user generator landing page
Route::get('/generate_users', 'DEVBFF@userHome')->name('gen_user.index');

# Directs user to the confirmation page of the ipsum generator
Route::post('/generate_ipsum', 'DEVBFF@createIpsum')->name('gen_ipsum.create');

# Directs user to the confirmation page of the random user generator
Route::post('/generate_users', 'DEVBFF@createUsers')->name('gen_user.create');
*/
