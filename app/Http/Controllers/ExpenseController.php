<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ExpenseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $expenses = Expense::all();
    #dump($expenses);
    #with(what you want to call it in the view, var name)
    #return view('home')->with('expenses', $expenses);
    #as an Array
    #return view('home')->with(['expenses'=> $expenses]);
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
    $rules = array(
      'expense_date' => 'required',
      'amount'=> 'required|decimal',
    );

    $validator = \Validator::make(Input::all(), $rules);

    // process the login
    if ($validator->fails()) {
      return Redirect::to('expenses/create')
      ->withErrors($validator)
      ->withInput(Input::except('password'));
    } else {

      // store
      $expense = new Expense;
      $expense->expense_date = Input::get('expense_date');
      $expense->amount= Input::get('amount');
      $expense->user_id = '1';
      $expense->save();

      $expenses = Expense::orderBy('expense_date','descending')->get();

      // redirect
      Session::flash('message', 'Successfully created a new expense!');
      #$return Redirect::to('/home')->with(['expenses'=>$expenses]);
      return Redirect::to('/home'); //LeahC 12/16

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
