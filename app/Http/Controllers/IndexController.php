<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class IndexController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    #directs user to the Expense Tracker sign in/ registration page
    return view('index');

  }

  public function homepage()
  {
    #directs user to the Expense Tracker sign in/ registration page
    #return view('home');

    #$expenses = Expense::orderBy('expense_date','descending')->get(); LeahC 12/16
    #dump($expenses);
    #                    with(what you want to call it in the view, var name)
    #return view('home')->with('expenses', $expenses);
    #as an Array
    #return view('home')->with(['expenses'=> $expenses]); LeahC 12/16
    return view('home');
  }
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
    //
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
