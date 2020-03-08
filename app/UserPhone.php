<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
   protected $table = 'user_phones';
   protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\form');
    }
}
