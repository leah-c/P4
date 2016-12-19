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
        <h2 class="modal-title" id="myAccRegModalLabel">Expense Tracker Account Registration</h2>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="well">

              <!-- send form input to be validated -->
              <form id="loginForm" method="POST" action = "/expenses/home">

                {{ csrf_field() }}

                <div class="form-group">
                  <label for="firstname" class="cols-sm-2 control-label">Full Name</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="name" id="name"  required="" placeholder="Full Name" value = ""/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="cols-sm-2 control-label">Email</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="email" id="email"  required="" placeholder="Email" value = ""/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="cols-sm-2 control-label">Password</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" name="password" id="password"  required="" placeholder="Enter your Password. You can enter special characters." value = ""/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="confirm_password" class="cols-sm-2 control-label">Confirm Password</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" name="confirm_password" id="confirm" required="" placeholder="Confirm your Password" value = ""/>
                    </div>
                  </div>
                </div>

                <button type="submit" value="register" name="submit" class="btn btn-success btn-block">Register</button>

              </form>
            </div>
          </div>
        </div>


        @endsection

        {{--
          This `body` section will be yielded right before the closing </body> tag.
          Use it to add specific things that *this* View needs at the end of the body,
          such as a page specific JavaScript files.
          --}}
          @section('body')
          @endsection
