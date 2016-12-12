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
        <h4 class="modal-title" id="myModalLabel">Expense Tracker</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-xs-6">
            <div class="well">
              <form id="loginForm" method="POST">
                <p class="lead">Existing Users Sign In</p>
                <div class="form-group">
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" name="username" value="" required="" title="Please enter your username" placeholder="username">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="password" value="" required="" title="Please enter your password">
                  <span class="help-block"></span>
                </div>

                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
<!--
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" id="remember"> Remember login
                  </label>

                  <p class="help-block">(if this is a private computer)</p>

                </div>
-->
                <button type="submit" value="login" name="submit" class="btn btn-success btn-block">Login</button>
              </form>
            </div> <!--class="well"-->

          </div>

          <div class="col-xs-6">
            <p class="lead">Don't have an account?</p>
            <p>Sign up now to:</p>
            <ul class="list-unstyled" style="line-height: 2">
              <li><span class="fa fa-check text-success"></span> See all your expenses</li>
              <li><span class="fa fa-check text-success"></span> Track expenses</li>
              <li><span class="fa fa-check text-success"></span> Tag expenses</li>
              <li><span class="fa fa-check text-success"></span> Create a budget plan </li>
              <li><span class="fa fa-check text-success"></span> Create a budget plan </li>
            </ul>
            <p><a href="account_reg" class="btn btn-info btn-block">Sign Me Up!</a></p>
          </div>
        </div>
      </div> <!--class="modal-body"-->
    </div> <!--class="modal-content"-->
  </div> <!--class="modal-overlay"-->


  <script type="text/javascript">

  </script>

  <!--
  <p>Welcome to the Expense Tracker tool menu!</p>

  <h2>Let's Get Started!</h2>
  <p> Select from one of the following options. </p>
  <ul>
  <li class="expenseOp"><a href="#">Add an Expense</a></li>
  <li class="expenseOp"><a href="#">Delete an Expense</a></li>
  <li class="expenseOp"><a href="#">Update an Expense</a></li>
  <li class="expenseOp"><a href="#">View Expenses</a></li>
</ul>
-->

<!--<h2>Lorem Ipsum Text Generator</h2>
<p>The Lorem Ipsum Text Generator tool will give you some dummy filler text. </p>
<a href ="generate_ipsum">Let's generate some Lorem Ipsum text!</a>


<h2>Random User Generator</h2>
<p>The Random User Generator tool will give you some dummy user names.</p>
<a href ="generate_users">Let's generate some random users!</a>
-->

@endsection

{{--
  This `body` section will be yielded right before the closing </body> tag.
  Use it to add specific things that *this* View needs at the end of the body,
  such as a page specific JavaScript files.
  --}}
  @section('body')
  @endsection
