<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    #directs user to the Expense Tracker sign in/ registration page
    return view('index');
  }

  public function validateLogin(Request $request)
  {
    # Validate
    $this->validate($request, [
      'email' => 'required | email',
      'password' => 'required | min:6',

    ]);

    // create our user data for the authentication
    $userdata = array(
      'email'     => $request->email,
      'password'  => $request->password
    );
    // attempt to do the login
    if (Auth::attempt($userdata)) {

      // validation successful!
      return Redirect::to('/expenses/home');

    } else {
      // validation not successful, send back to form
      Session::flash('error_message', 'Your credentials were invalid. Please try logging in again.');
      return Redirect::to('/');
    }
  }
}
