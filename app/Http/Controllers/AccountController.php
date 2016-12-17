<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function registerAccount()
  {
    # directs user to the account registration page
    return view('account_reg');
  }

  public function validateAccount(Request $request)
  {


    # Validation
    if($request->input('submit') == 'login'){
      $requestType = $request->input('submit');
      $loginPW = $request->input('password');

      echo 'request: '.$requestType.' '. 'password: '. $loginPW;

    }

    elseif ($request->input('submit') == 'register'){
      $requestType = $request->input('submit');
      $loginPW = $request->input('password');

      echo 'request: '.$requestType.' '. 'password: '. $loginPW;

    }
    return view('home');
  } /*end validateAccount()*/

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    # Validate
    $this->validate($request, [
      'name' => 'required ',
      'email' => 'required | email',
      'password' => 'required | alphanumeric',
      'confirm_password' => 'required | alphanumeric',
    ]);

    // store
    $expense = new Expense;
    $expense->expense_date = Input::get('expense_date');
    $expense->amount= Input::get('amount');
    $expense->user_id = '1';

    # check to see if a category was selected
    if (isset( $_POST['description']) && $_POST['description'] != '') {
      $expense->description = Input::get('description');
    };

    # check to see if an expense desc was created
    if (isset( $_POST['category_id']) && $_POST['category_id'] != '') {
      $expense->category_id = Input::get('category_id');
    };

    $expense->save();

    // redirect
    Session::flash('message', 'Successfully created a new expense!');

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
