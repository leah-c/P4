<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;

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


}
