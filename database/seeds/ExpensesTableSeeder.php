<?php

use Illuminate\Database\Seeder;
use App\Category;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category_id = Category::where('category_name','=','general expense')->pluck('id')->first();


      DB::table('expenses')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

        'expense_date' => '2016-08-01',
        'amount' => '30',
        'category_id' => $category_id,
        'user_id'=> '2',
      ]);

      DB::table('expenses')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

        'expense_date' => '2016-09-01',
        'amount' => '12.16',
        'category_id' => $category_id,
        'user_id'=> '2',
      ]);

      DB::table('expenses')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

        'expense_date' => '2016-09-24',
        'amount' => '9.07',
        'category_id' => $category_id,
        'user_id'=> '1',
      ]);



    }
}
