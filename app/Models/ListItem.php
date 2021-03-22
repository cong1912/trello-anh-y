<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    protected $guarded = [];
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function checkItem()
    {
        return $this->hasMany(CheckItem::class,'list_id')->where('status', 1)->orderBy('order', 'desc');
    }
}
