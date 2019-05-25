<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTeam extends Model
{
    public function result(){
        return $this->hasOne('App\Models\Result');
    }

    public function team(){
        return $this->belongsTo('App\Models\Team','team_id');
    }

    public function game(){
        return $this->belongsTo('App\Models\Game','game_id');
    }

    public function scoreboards(){
        return $this->hasManyThrough('App\Models\Scoreboards','App\Models\Result');
    }

    public function modalitie(){
        return $this->hasOneThrough('App\Models\Modality','App\Models\Team');
    }

}
