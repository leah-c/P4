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

  public function example6() {

    $expenses = Expense::all();

    if(!$expenses->isEmpty()) {

      # Output the books
      foreach($expenses as $expense) {
        echo 'Expense Date: '.$expense->expense_date.' ';
        echo 'Amount: '.$expense->amount.'<br>';
      }
    }
    else {
      echo 'No expenses found';
    }
  }

  #Delete function
  public function example7() {

    # First get a book to delete
    $expense = Expense::where('amount', '>=', '50')->first();

    # If we found the book, delete it
    if($expense) {

      # Goodbye!
      $expense->delete();

      return "Deletion complete; check the database to see if it worked...";

    }
    else {
      return "Can't delete - all expenses are less than $50.";
    }
  }

#update
  public function example8() {

    # First get a book to delete
    # First get a book to update
    $expense = Expense::where('amount', '<=', '300')->first();

    # If we found the book, update it
    if($expense) {

        # Give it a different title
        $expense->amount = '2.00';

        # Save the changes
        $expense->save();

        echo "Update complete; check the database to see if your update worked...";
    }
    else {
        echo "Expenses are all > $20.";
    }
  }

  function example9() {
    $expenses = Expense::all();
    return view('home')->with('expenses', $expenses);
}



}
