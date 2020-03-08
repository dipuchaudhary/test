<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    protected $table = 'forms';

    protected $guarded = [];


    public function phones(){
        return $this->hasMany('App\UserPhone','user_id');
    }
}
