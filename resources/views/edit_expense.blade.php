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
        <h2 class="modal-title" id="myAccRegModalLabel">Edit Expense</h2>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="well">

              <!-- send form input to be validated -->
              <form id="add_expense_form" method="POST" action = "">

                {{ csrf_field() }}

                <div class="form-group">
                  <label for="dateOfExpense" class="cols-sm-2 control-label">Expense Date</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                      <input type="date" class="form-control" name="name" id="fname"  required=""  value = "{{old('expense', $expense->expense_date)}}"/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="expenseAmount" class="cols-sm-2 control-label">Amount</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-usd fa-lg" aria-hidden="true"></i></span>
                      <input type="decimal" class="form-control" name="expenseAmount" id="expenseAmount"  required="" placeholder="Expense Amount" value = "{{old('expense', $expense->amount)}}""/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="expenseCategory" class="cols-sm-2 control-label">Category</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="expenseCategory" id="expenseCategory"  placeholder="Expense category" value = ""{{old('expense', $expense->category_id)}}"/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="expenseDesc" class="cols-sm-2 control-label">Description</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-file-text fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="expenseDesc" id="expenseDesc" placeholder="Description of the expense" value = "{{old('expense', $expense->description)}}"/>
                    </div>
                  </div>
                </div>

                <button type="submit" value="addNewExpense" name="submit" class="btn btn-success btn-block">Save Expense</button>
              </form>

            </div>
          </div>
        </div>

        <script type="text/javascript" src="assets/js/bootstrap.js"></script>

        @endsection

        {{--
          This `body` section will be yielded right before the closing </body> tag.
          Use it to add specific things that *this* View needs at the end of the body,
          such as a page specific JavaScript files.
          --}}
          @section('body')
          @endsection
