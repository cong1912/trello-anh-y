<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    protected $fillable=[
      'name',
      'slug',
    ];
    protected $guarded = [];

    public function board()
    {
        return $this->hasMany(Board::class,'project_id')->where('status', 1)->orderBy('order', 'desc')->get();
    }
    public function listItem(){
        return $this->hasManyThrough( 'App\Models\ListItem',
            'App\Models\Board',
            'project_id',
            'board_id',
            'id',
            )->orderBy('order', 'desc');
    }
    public function checkItem(){
        return $this->hasManyDeep('App\Models\CheckItem', ['App\Models\Board', 'App\Models\ListItem'])->withTrashed('check_items.order');
    }


}
