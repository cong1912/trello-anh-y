<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    public function board()
    {
        return $this->hasMany(Board::class,'project_id')->where('status', 1)->orderBy('order', 'desc');
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
