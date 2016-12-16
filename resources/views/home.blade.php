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

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h2>Expense Tracker</2>

    {{--<h2>Let's Get Started!</h2>--}}

    <p> Select from one of the following options. </p>
    <ul>
      <li class="expenseOp"><a href="/expenses/create" class="btn btn-sm btn-primary btn-block" id="add_expense"><span class="glyphicon glyphicon-plus"></span> Add an Expense</a></li>
      <li class="expenseOp"><a href="/expenses" class="btn btn-sm btn-primary btn-block" id="view_expense"><span class="glyphicon glyphicon-th-list"></span> View Expense</a></li>
      <!--<li class="expenseOp"><a href="#" class="btn btn-sm btn-warning btn-block" id="edit_expense"><span class="glyphicon glyphicon-edit"></span> Edit an Expense</a></li>
      <li class="expenseOp"><a href="#" class="btn btn-sm btn-primary btn-block" id="view_expense"><span class="glyphicon glyphicon-th-list"></span> View Expenses</a></li>
    -->
  </ul>

  @endsection

{{--
  This `body` section will be yielded right before the closing </body> tag.
  Use it to add specific things that *this* View needs at the end of the body,
  such as a page specific JavaScript files.
  --}}
  @section('body')
  @endsection
