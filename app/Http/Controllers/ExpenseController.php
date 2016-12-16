<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;
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
    #$expenses = Expense::all();
    $expenses = Expense::orderBy('expense_date', 'descending')->get(); #query
    return view('view_expenses')->with(['expenses'=> $expenses]); //LeahC 12/16
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('add_expense');

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    #dump($request);
    # Validate
    $this->validate($request, [
        'expense_date' => 'required | date',
        'amount' => 'required | numeric',
    ]);

    // store
    $expense = new Expense;
    $expense->expense_date = Input::get('expense_date');
    $expense->amount= Input::get('amount');
    $expense->user_id = '1';

    # check to see if an expense desc was created
    if (isset( $_POST['description']) && $_POST['description'] != '') {
      $expense->description = Input::get('description');
    };

    # check to see if a category was selected
    if (isset( $_POST['category_id']) && $_POST['category_id'] != '') {
        $expense->category_id = Input::get('category_id');
    };

    $expense->save();

    #$expenses = Expense::orderBy('expense_date','descending')->get();

    // redirect
    Session::flash('message', 'Successfully created a new expense!');
    #$return Redirect::to('/home')->with(['expenses'=>$expenses]);
    #return Redirect::to('/home'); //LeahC 12/16
    return Redirect::to('/expenses'); //LeahC 12/16
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
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
    //
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
