<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $guarded = [];

    public function submenus(){
        return $this->hasMany('App\Menu','parent_id','id');
    }

}
