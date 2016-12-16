<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectCategoriesAndExpenses extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('expenses', function (Blueprint $table) {

      # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
      $table->foreign('category_id')->references('id')->on('categories');
      
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
