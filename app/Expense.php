<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  /* Relationship Methods */

  /**
  *
  */
  public function expense() {
    # Book belongs to Author
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('App\User');
  }


  /*public function user() {
    return $this->belongsTo('App\User');
  }*/

  /* End Relationship Methods */
}
