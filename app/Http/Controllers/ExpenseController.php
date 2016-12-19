<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user = Auth::user();

    if($user) {
      
      $expenses = DB::table('expenses')
      ->Join('categories', 'categories.id', '=', 'expenses.category_id')
      ->Join('users','users.id', '=', 'expenses.user_id')
      ->select('expenses.*', 'categories.category_name')
      ->where('expenses.user_id','=',$user->id)
      ->orderBy('expenses.expense_date', 'DESC')
      ->get();

      return view('view_expenses')->with(['expenses' => $expenses]);
    }

    else {
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }

  public function viewCategoryTotals()
  {
    $user = Auth::user();

    if($user) {

      $expenses = DB::table('expenses')
      ->select( DB::raw('sum(expenses.amount) as expense_total,categories.category_name'))
      ->Join('categories', 'categories.id', '=', 'expenses.category_id')
      ->Join('users','users.id', '=', 'expenses.user_id')
      ->where('expenses.user_id','=',$user->id)
      ->groupBy('categories.category_name')
      ->get();

      return view('view_totals')->with(['expenses' => $expenses]);
    }

    else {
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = Auth::user();
    #Category
    $categories_for_dropdown = Category::getForDropdown();

    if($user){
      return view('add_expense')->with(
        [
          'categories_for_dropdown' => $categories_for_dropdown,
        ]
      );
    }
    else {
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $user = Auth::user();

    # Validate
    $this->validate($request, [
      'expense_date' => 'required | date',
      'amount' => 'required | numeric',
      'category_name' => 'required',
      'description' => 'max:50',
    ]);

    // Grab the category id associate with the category_name being passed from the add_expense view
    // figure out how to associate it together
    $selected_category = Category::getCategoryIDByName($request->category_name);

    if($user){
      // store
      $expense = new Expense;
      $expense->expense_date = $request->expense_date;

      $expense->amount= $request->amount;
      $expense->category_id= $selected_category->id;
      $expense->user_id = $user->id;

      # check to see if an expense desc was created
      if (isset( $_POST['description']) && $_POST['description'] != '') {
        $expense->description = $request->description;
      };

      $expense->save();

      // redirect
      Session::flash('message', 'Successfully created a new expense!');
      return Redirect::to('/expenses/home');
    }
    else{
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {

    $expense = Expense::find($id);

    if(is_null($expense)) {
      Session::flash('error_message','Expense not found.');
      return redirect('/expenses/home');
    }

    return view('expenses.show')->with('expense', $id);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $user = Auth::user();
    $expense = Expense::find($id);

    if($user){

      if(is_null($expense)) {
        Session::flash('error_message','Expense not found.');
        return redirect('/expenses/home');
      }

      $categories_for_dropdown = Category::getForDropdown();

      return view('edit_expense')->with(
        [
          'expense'=>$expense,
          'categories_for_dropdown' => $categories_for_dropdown,
        ]
      );
    }

    else{
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $user = Auth::user();

    # Validate
    $this->validate($request, [
      'expense_date' => 'required | date',
      'amount' => 'required | numeric',
      'category_id' => 'required',
      'description' => 'max:50',
    ]);

    if($user){
      # Find and update expense
      $expense = Expense::find($request->id);
      $expense->expense_date = $request->expense_date;
      $expense->amount = $request->amount;
      $expense->category_id= $request->category_id;

      # check to see if an expense desc was created
      if (isset( $_POST['description']) && $_POST['description'] != '') {
        $expense->description = $request->description;
      };

      $expense->save();

      Session::flash('message', 'Your changes were saved.');
      return redirect('/expenses/home');
    }
    else{
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }

  public function delete($id){
    $user = Auth::user();
    $expense = Expense::find($id);

    if($user){
      if(is_null($expense)) {
        Session::flash('error_message','Cannot complete delete operation. Expense not found.');
        return redirect('/expenses/home');
      }

      $categories_for_dropdown = Category::getForDropdown();

      return view('delete_expense')->with(
        [
          'expense'=>$expense,
          'categories_for_dropdown' => $categories_for_dropdown,
        ]
      );
    }
    else{
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }

  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $user = Auth::user();
    # Get the expense to be deleted
    $expense = Expense::find($id);

    if($user){
      if(is_null($expense)) {
        Session::flash('error_message','Expense not found.');
        return redirect('/expenses/home');
      }


      # Then delete the book
      $expense->delete();

      # Finish
      Session::flash('message', 'Expense entered for ' . $expense->expense_date . ' in the amount of $'. $expense->amount.' was deleted.');
      return redirect('/expenses/home');
    }
    else {
      // redirect
      Session::flash('error_message', 'You are not logged in. Please log in to view and edit expense information.');
      return Redirect::to('/');
    }
  }
}
