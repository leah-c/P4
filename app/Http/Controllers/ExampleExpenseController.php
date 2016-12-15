<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
Use App\Expense;

class ExampleExpenseController extends Controller
{

  # Read
  public function example1() {
    # Use the QueryBuilder to get all the books
    $categories = DB::table('categories')->get();

    # Output the results
    foreach ($categories as $categories) {
      echo $categories->category_name.'<br>';
    }
  }

  # Read
  public function example2() {
    # Use the QueryBuilder to get all the books
    $expenses = DB::table('expenses')->get();

    # Output the results
    foreach ($expenses as $expenses) {
      echo 'Expense Date: '. $expenses->expense_date.' Expense Amount: ' . $expenses->amount.'<br>';
    }
  }

  #create/ insertion
  public function example3() {
    # Use the QueryBuilder to insert a new row into the books table
    # i.e. create a new book
    DB::table('expenses')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'expense_date' => '2016-12-15',
      'amount' => '288.94',
      'comments' => 'a large purchase',
      'category_id' => '2',
      'user_id' => '1'
    ]);

    return ('Added a new expense.');
  }

  public function example4() {
    # Use the QueryBuilder to insert a new row into the books table
    # i.e. create a new book
    $user = DB::table('users')->find(2);

    echo $user->name;
  }

  public function example5() {

    # Instantiate a new Book Model object
    $expense = new Expense();

    # Set the parameters
    # Note how each parameter corresponds to a field in the table
    $expense->expense_date= '2015-03-03';
    $expense->amount= '39.99';
    $expense->comments= 'small expense';
    $expense->user_id= '3';

    # Invoke the Eloquent save() method
    # This will generate a new row in the `books` table, with the above data
    $expense->save();

    echo 'Added the following expense: <br> Expense Date: '.$expense->expense_date.'<br>Amount: '. $expense->amount;

  }

}
