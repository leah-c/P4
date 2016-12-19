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

  <div class ="container">
    <div class="col-md-4 col-md-offset-8">
      <a href="/expenses/create" class="btn btn-sm btn-primary" id="add_expense"><span class="glyphicon glyphicon-plus"></span> {{"Add an Expense"}}</a>
      <a href="/expenses/home" class="btn btn-sm btn-primary" id="view_category"><span class="glyphicon glyphicon-eye-open"></span> {{"View All Expenses"}}</a>
    </div>
  </div>

  @if (isset($expenses) && sizeof($expenses) > 0)

  <table data-toggle="table" class="table table-striped">
    <thead>
      <tr>
        <th>Category</th>
        <th>Amount</th>
      </tr>
    </thead>

    <tbody>

      @foreach($expenses as $expense)
      <tr>
        <td>{{$expense->category_name}}</td>
        <td>${{$expense->expense_total}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
  @else
  <div class="col-md-6 col-md-offset-3">
    <p id="no_expenses_text" class="text-center">
      {{"There are no expenses to be displayed. Get started by adding an expense."}}
    </p>
  </div>
  @endif
  @endsection

  {{--
    This `body` section will be yielded right before the closing </body> tag.
    Use it to add specific things that *this* View needs at the end of the body,
    such as a page specific JavaScript files.
    --}}
    @section('body')
    @endsection
