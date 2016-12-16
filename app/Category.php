<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function categories() {
    # Category has many Expenses
    # Define a one-to-many relationship.
    return $this->hasMany('App\Expense');
  }

  public static function getForDropdown() {

    # Categories
    $categories = Category::orderBy('category_name', 'ASC')->get();

    $categories_for_dropdown = [];
    foreach($categories as $category) {
      $categories_for_dropdown[$category->id] = $category->category_name;
    }

    return $categories_for_dropdown;
  }
}
