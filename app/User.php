<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /* Relationship Methods */

  /**
  *
  */
  public function expenses() {
    # User has many Expenses
    # Define a one-to-many relationship.
    return $this->hasMany('App\Expense');
  }

  /* End Relationship Methods */


  /**
  *
  */


  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];
}
