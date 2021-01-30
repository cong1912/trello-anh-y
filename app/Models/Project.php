<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function board()
    {
        return $this->hasMany(Board::class,'project_id')->where('status', 1)->orderBy('order', 'desc');
    }
}
