<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerTeam extends Model
{
    public function team(){
        return $this->belongsTo('App\Models\Team','team_id');
    }

    public function player(){
        return $this->belongsTo('App\Models\Player','player_id');
    }
}
