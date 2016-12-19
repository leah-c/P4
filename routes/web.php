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

# Show all expenses after log in
Route::post('/expenses/home', 'ExpenseController@index')->name('expense.index');

# Show all expenses when user clicks cancel upon editin or adding an expense
Route::get('/expenses/home', 'ExpenseController@index')->name('expense.index');

# Show all expenses after log in
Route::get('/expenses/home/category_totals', 'ExpenseController@viewCategoryTotals')->name('expense_totals');

# Show a form to add an expense
Route::get('/expenses/create', 'ExpenseController@create')->name('expense.create');

# Process the form to add a new expense
Route::post('/expenses', 'ExpenseController@store')->name('expense.store');

# Show an individual expense
Route::get('/expenses/{id}', 'ExpenseController@show')->name('expense.show');

# Show form to edit an expense
Route::get('/expenses/{id}/edit', 'ExpenseController@edit')->name('expense.edit');

# Process form to edit an expense
Route::put('/expenses/{id}', 'ExpenseController@update')->name('expense.update');

# Get route to confirm deletion of an expense
Route::get('/expenses/{id}/delete', 'ExpenseController@delete')->name('expense.delete');

# Delete route to actually destroy the expense
Route::delete('/expenses/{id}', 'ExpenseController@destroy')->name('expense.destroy');

Auth::routes();

Route::post('/login', 'IndexController@validateLogin')->name('login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
