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
#Route::post('/home', 'AccountController@validateAccount')->name('validate_acct.create');

Route::get('/example1', 'ExampleExpenseController@example1')->name('example1.show');

Route::get('/example2', 'ExampleExpenseController@example2')->name('example2.show');

Route::get('/example3', 'ExampleExpenseController@example3')->name('example3.show');

Route::get('/example4', 'ExampleExpenseController@example4')->name('example4.show');

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
