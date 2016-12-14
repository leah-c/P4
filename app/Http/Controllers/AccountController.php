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
    dd($request);
    # Validation
    /*this->validate($request, [
     'name' => 'required|numeric|min:1|max:50',
     'password' => 'required|numeric|min:1|max:50',
     'confirm_password' => 'required|numeric|min:1|max:50',
   ])
     */

      //$input = $request->all();
      //ddump($request);
    }

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
