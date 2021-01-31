<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function listItem()
    {
        return $this->hasMany(ListItem::class,'board_id')->where('status', 1)->orderBy('order', 'desc');
    }
}
