@extends('layouts.master')

@section('title')
  Expense Tracker
@endsection

  {{--
    This `head` section will be yielded right before the closing </head> tag.
    Use it to add specific things that *this* View needs in the head,
    such as a page specific stylesheets.
  --}}
  @section('head')

  @endsection

  @section('content')

  <div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="myIndexModalLabel">Expense Tracker</h2>
      </div>

      <div class="modal-body">
        <div class="row">

          <div class="col-xs-6">
            <div class="well">

              <form id="loginForm" method="POST" action = "/login">

                {{ csrf_field() }}

                <p class="lead">Existing Users Sign In</p>

                <div class="form-group">

                  <label class="cols-sm-2 control-label">Email</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="email" required="" title="Please enter your email" placeholder="Email" value = "">
                      <span class="help-block"></span>
                    </div>
                    <div class='error'>{{ $errors->first('email') }}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="cols-sm-2 control-label">Password</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" name="password" placeholder="Password" value="" required="" title="Please enter your password">
                      <span class="help-block"></span>
                    </div>
                    <div class='error'>{{ $errors->first('password') }}</div>
                  </div>
                </div>

                <button type="submit" value="login" name="submit" class="btn btn-success btn-block">Login</button>
              </form>
            </div> <!--class="well"-->
          </div>

          <div class="col-xs-6">
            <p class="lead">Don't have an account? </p>
            <p>Sign up to:</p>
            <ul class="list-unstyled" style="line-height: 2">
              <li><span class="fa fa-check text-success"></span> Create a budget plan</li>
              <li><span class="fa fa-check text-success"></span> Receive alerts</li>
              <li><span class="fa fa-check text-success"></span> Track your expenses</li>
              <li><span class="fa fa-check text-success"></span> Categorize and organize expenses</li>
              <li><span class="fa fa-check text-success"></span> View snapshot of spending habits</li>
            </ul>

            <p><a href="/register" class="btn btn-info btn-block">Sign Me Up!</a></p>
          </div>
        </div> <!--class="row"-->
      </div> <!--class="modal-body"-->
    </div> <!--class="modal-content"-->
  </div> <!--class="modal-overlay"-->


  @endsection

  {{--
    This `body` section will be yielded right before the closing </body> tag.
    Use it to add specific things that *this* View needs at the end of the body,
    such as a page specific JavaScript files.
    --}}
    @section('body')
    @endsection
