<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public function comments(){
        return $this->hasMany('App\Models\Comment','notice_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
