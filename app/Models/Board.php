<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = [];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function listItem()
    {
        return $this->hasMany(ListItem::class,'board_id')->where('status', 1)->orderBy('order', 'desc')->get();
    }
    public function checkItem()
    {
        return $this->hasMany(CheckItem::class,'list_id')->where('status', 1)->orderBy('order', 'desc');
    }
}
