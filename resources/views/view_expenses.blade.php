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

  <h2>Expense Tracker</h2>

  <!-- will be used to show any messages -->
  @if (Session::has('message'))
  <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  <a href="/expenses/create" class="btn btn-sm btn-primary" id="add_expense"><span class="glyphicon glyphicon-plus"></span> Add an Expense</a>
  <!--<p> Select from one of the following options. </p>
  <ul>
  <li class="expenseOp"><a href="#" class="btn btn-sm btn-primary btn-block" id="add_expense"><span class="glyphicon glyphicon-plus"></span> Add an Expense</a></li>
  <li class="expenseOp"><a href="#" class="btn btn-sm btn-danger btn-block" id="delete_expense"><span class="glyphicon glyphicon-remove"></span> Delete an Expense</a></li>
  <li class="expenseOp"><a href="#" class="btn btn-sm btn-warning btn-block" id="edit_expense"><span class="glyphicon glyphicon-edit"></span> Edit an Expense</a></li>
  <li class="expenseOp"><a href="#" class="btn btn-sm btn-primary btn-block" id="view_expense"><span class="glyphicon glyphicon-th-list"></span> View Expenses</a></li>
</ul>
-->

@if (isset($expenses) && $expenses->count() > 0)
{{--
{{dump($expenses)}}
{{dump($expenses->count())}}
--}}
<table data-toggle="table" class="table table-striped">
  <thead>
    <tr>
      <th>Expense Date</th>
      <th>Amount</th>
      <th>Description</th>
      <th>Category</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($expenses as $expense)
    <tr>
      <td>{{$expense->expense_date}}</td>
      <td>${{$expense->amount}}</td>
      <td>{{$expense->description}}</td>
      <td>{{$expense->category_id}}</td>
      <td><a href="#" class="btn btn-sm btn-warning " id="edit_expense"><span class="glyphicon glyphicon-edit"></span></a>
        <td><a href="#" class="btn btn-sm btn-danger " id="remove_expense"><span class="glyphicon glyphicon-remove"></span></a>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endif

    @endsection



    <script src="bootstrap-table.js"></script>
    {{--
      This `body` section will be yielded right before the closing </body> tag.
      Use it to add specific things that *this* View needs at the end of the body,
      such as a page specific JavaScript files.
      --}}
      @section('body')
      @endsection
