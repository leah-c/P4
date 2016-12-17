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

    /**
    * To Dos
    *
    *   1. determine if this is a log-in event or a account creation Environment
    *   2. redirect user to
    *       a. the account reg page if errors are encountered while creating a new account
    *       b. the sign page if errors are encountered while signing in
    *   3. display errors on the page if any
    *   4. create flash message upon successful login or successful account creation
    */


    # Validation
    if($request->input('submit') == 'login'){
      $requestType = $request->input('submit');
      $loginPW = $request->input('password');

      echo 'request: '.$requestType.' '. 'password: '. $loginPW;

      /*
      $this->validate($request, [
      'email' => 'required',
      'password' => 'required|min:1|max:50',
    ])
    */
  }

  elseif ($request->input('submit') == 'register'){
    $requestType = $request->input('submit');
    $loginPW = $request->input('password');

    echo 'request: '.$requestType.' '. 'password: '. $loginPW;
    /*
    $this->validate($request, [
    'firstname' => 'required|min:1|max:255',
    'lastname' => 'required|min:1|max:255',
    'email' => 'required',
    'password' => 'required|min:1|max:50',
    'confirm_password' => 'required|min:1|max:50',
  ])
  */
}
return view('home');
} /*end validateAccount()*/


/*    public function createUserAccount(Request $request)
{
# Validation
$this->validate($request, [
'numParagraphs' => 'required|numeric|min:1|max:50',
]);
*/
/*
# generate paragraphs
$numParagraphs = $request->input('numParagraphs');
$generator = new \Badcow\LoremIpsum\Generator();
$paragraphs = $generator->getParagraphs($numParagraphs);

return view('generator.ipsum_confirm')
->with('numParagraphs', $numParagraphs)
->with(compact('paragraphs'));
*/


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
