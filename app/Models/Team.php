<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function gameteams(){
        return $this->hasMany('App\Models\GameTeam','team_id');
    }

    public function playerteams(){
        return $this->hasMany('App\Models\PlayerTeam','team_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function modality(){
        return $this->belongsTo('App\Models\Modality','modality_id');
    }

    public function punctuation(){
        return $this->hasOne('App\Models\Punctuation','team_id');
    }
    public function games()
    {
        return $this->hasManyThrough('App\Models\Games','App\Models\GameTeam');
    }
}
