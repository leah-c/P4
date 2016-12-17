<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = Category::all();
    $expenses = Expense::orderBy('expense_date', 'descending')->get(); #query

    return view('view_expenses')->with(
      [
        'expenses'=> $expenses,
        'categories'=> $categories,
      ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    #Category
    $categories = Category::orderBy('category_name', 'ASC')->get();

    $categories_for_dropdown = [];

    foreach($categories as $category){
      $categories_for_dropdown[$category->id]=$category->category_name;
    }

    return view('add_expense')->with(
      [
        'categories_for_dropdown' => $categories_for_dropdown,
      ]
    );

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    dump($request);
    # Validate
    $this->validate($request, [
      'expense_date' => 'required | date',
      'amount' => 'required | numeric',
      'category_name' => 'required',
      'description' => 'max:50',
    ]);

    // Grab the category id associate with the category_name being passed from the add_expense view
    $selected_category =
      DB::table('categories')->where('category_name', $request->category_name )->first();

    $selected_category_id = $selected_category->id;
    // store
    $expense = new Expense;
    $expense->expense_date = $request->expense_date;

    $expense->amount= $request->amount;
    $expense->category_id= $selected_category_id;
    $expense->user_id = '1';

    # check to see if an expense desc was created
    if (isset( $_POST['description']) && $_POST['description'] != '') {
      $expense->description = Input::get('description');
    };

  $expense->save();

  // redirect
  Session::flash('message', 'Successfully created a new expense!');
  return Redirect::to('/expenses');
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
    Session::flash('message','Expense not found');
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
  #TO DO
  # Validate that it is a good $id being passed in
  $expense = Expense::find($id);

  #Category
  $categories = Category::orderBy('category_name', 'ASC')->get();

  #dump($categories);

  $categories_for_dropdown = [];

  foreach($categories as $category){
    $categories_for_dropdown[$category->id]=$category->category_name;
  }

  return view('edit_expense')->with(
    [
      'expense'=>$expense,
      'categories_for_dropdown' => $categories_for_dropdown,
    ]
  );
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
  # Validate
  $this->validate($request, [
    'expense_date' => 'required | date',
    'amount' => 'required | numeric',
    'category_id' => 'required',
    'description' => 'max:50',
  ]);

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
  return redirect('/expenses');

}

public function delete($id){
  #TO DO
  # Validate that it is a good $id being passed in
  $expense = Expense::find($id);

  #Category
  $categories = Category::orderBy('category_name', 'ASC')->get();

  #dump($categories);

  $categories_for_dropdown = [];

  foreach($categories as $category){
    $categories_for_dropdown[$category->id]=$category->category_name;
  }

  return view('delete_expense')->with(
    [
      'expense'=>$expense,
      'categories_for_dropdown' => $categories_for_dropdown,
    ]
  );
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  //
}
}
