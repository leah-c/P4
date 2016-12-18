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

# Direct user to the Expense Tracker sign in/registration page
Route::post('/', 'AccountController@validateAccount')->name('expense_tracker.index');

# Direct user to the Expense Tracker landing page after adding and expense
Route::get('/home', 'IndexController@homepage')->name('expense_tracker.home')->middleware('auth');

# Direct user to the Expense Tracker landing page after account registration/ sign in
# will show expense table if user has any associated with their id
Route::post('/home', 'IndexController@homepage')->name('expense_tracker.home');

#Direct user to the registration form page
Route::get('/register_new_account', 'AccountController@registerAccount')->name('new_account.store');

# Show all expenses
Route::get('/expenses', 'ExpenseController@index')->name('expense.index');

# Show all expenses after log in
Route::post('/expenses/home', 'ExpenseController@index')->name('expense.index');

# Show all expenses when user clicks cancel upin editin or adding an expense
Route::get('/expenses/home', 'ExpenseController@index')->name('expense.index');

# Show a form to add an expense
Route::get('/expenses/create', 'ExpenseController@create')->name('expense.create');
#Route::get('/expense/create', 'ExpenseController@create')->name('expenses.create')->middleware('auth');

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

# Delete route to actually destroy the book
Route::delete('/expenses/{id}', 'ExpenseController@destroy')->name('expense.destroy');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index');

Route::get('/show-login-status', function() {

  # You may access the authenticated user via the Auth facade
  $user = Auth::user();

  if($user)
  dump($user->toArray());
  else
  dump('You are not logged in.');

  return;
});
