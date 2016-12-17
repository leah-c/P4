<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  /* Relationship Methods */

  /**
  *
  */
  public function expenses() {
    # Category has many Expenses
    # Define a one-to-many relationship.
    return $this->hasMany('App\Expense');
  }

  /* End Relationship Methods */


  /**
  * Populate dropdown lists in the Add and Edit Expense views
  */
  public static function getForDropdown() {

    # Categories
    $categories = Category::orderBy('category_name', 'ASC')->get();

    $categories_for_dropdown = [];
    foreach($categories as $category) {
      $categories_for_dropdown[$category->id] = $category->category_name;
    }

    return $categories_for_dropdown;
  }

  public static function getCategoryName($id) {

    # Categories
    $category_name = Category::where('id', $id)->first();
    //$categories = Category::find()->get();

    dd($category_name);
  }

}
