<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTeam extends Model
{
    /*public $with = ['team','game','scoreboards','result'];*/
    public function result(){
        return $this->hasOne('App\Models\Result','game_team_id');
    }

    public function team(){
        return $this->belongsTo('App\Models\Team');
    }

    public function game(){
        return $this->belongsTo('App\Models\Game');
    }

    public function scoreboards(){
        return $this->hasManyThrough('App\Models\Scoreboard','App\Models\Result');
    }

    public function modality(){
        return $this->hasOneThrough('App\Models\Modality','App\Models\Team');
    }

}
