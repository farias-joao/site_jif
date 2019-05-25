<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function scoreboards(){
        return $this->hasMany('App\Models\Scoreboard');
    }

    public function gameteam(){
        return $this->belongsTo('App\Models\GameTeam');
    }

}
