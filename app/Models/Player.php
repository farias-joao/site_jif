<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function playerteams(){
        return $this->hasMany('App\Models\PlayerTeam');
    }

    public function teams(){
        return $this->hasManyThrough('App\Models\Team','App\Models\PlayerTeam');
    }
}
