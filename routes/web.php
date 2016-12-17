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
Route::get('/home', 'IndexController@homepage')->name('expense_tracker.home');

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
Route::get('/expenses/{id}/delete', 'ExpenseController@delete')->name('expense.destroy');

# Delete route to actually destroy the book
Route::delete('/expenses/{id}', 'ExpenseController@destroy')->name('expense.destroy');

/*
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database expenses');
        DB::statement('CREATE database expenses');

        return 'Dropped expenses; created expenses.';
    });

};
*/

/*
#test db conection
Route::get('/debug', function() {

  echo '<pre>';

  echo '<h1>Environment</h1>';
  echo App::environment().'</h1>';

  echo '<h1>Debugging?</h1>';
  if(config('app.debug')) echo "Yes"; else echo "No";

  echo '<h1>Database Config</h1>';
  /*
  The following line will output your MySQL credentials.
  Uncomment it only if you're having a hard time connecting to the database and you
  need to confirm your credentials.
  When you're done debugging, comment it back out so you don't accidentally leave it
  running on your live server, making your credentials public.
  */
  //print_r(config('database.connections.mysql'));
/*
  echo '<h1>Test Database Connection</h1>';
  try {
    $results = DB::select('SHOW DATABASES;');
    echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
    echo "<br><br>Your Databases:<br><br>";
    print_r($results);
  }
  catch (Exception $e) {
    echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
  }

  echo '</pre>';

});
*/
