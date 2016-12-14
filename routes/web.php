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

# Direct user to the Expense Tracker sign in/registration page
Route::get('/', 'IndexController@index')->name('expense_tracker.index');

#Direct user to the registration form page
Route::get('/account_reg', 'AccountController@registerAccount')->name('account_reg.index');

# Direct user to the Expense Tracker landing page after account registration/ sign in
Route::post('/home', 'IndexController@homepage')->name('expense_tracker.home');

# Directs form input from the account registration page to be validated
Route::post('/validate_acct', 'AccountController@validateAccount')->name('validate_acct.create');
