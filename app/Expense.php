<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  /* Relationship Methods */

  /**
  *
  */
  public function category() {
    # Book belongs to Author
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('App\Category');
  }


  public function user() {
    return $this->belongsTo('App\User');
  }

  /* End Relationship Methods */
}
