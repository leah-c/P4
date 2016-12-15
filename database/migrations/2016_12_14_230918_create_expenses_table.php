<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('expenses', function (Blueprint $table) {

      # Increments method will make a Primary, Auto-Incrementing field.
      # Most tables start off this way
      $table->increments('id');

      # This generates two columns: `created_at` and `updated_at` to
      # keep track of changes to a row
      $table->timestamps();
      #$table->timestamp('created_at')->useCurrent = true;

      # The rest of the fields...
      $table->string('expense_name');
      $table->decimal('amount');
      $table->DateTime('expense_date');
      $table->text('comments')->nullable();
      $table->integer('active')->default(1);
      $table->integer('user_id');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('expenses');
  }
}
