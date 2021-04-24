<?php

namespace  App\models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable=[
        'id',
        'item',
        'done',
      ];
      protected $guarded = [];
  
}
