<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    public function result(){
        return $this->belongsTo('App\Models\Result','result_id');
    }
    public function round(){
        return $this->hasOne('App\Models\Round');
    }

}
