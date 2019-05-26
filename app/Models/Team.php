<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function gameteams(){
        return $this->hasMany('App\Models\GameTeam');
    }

    public function playerteams(){
        return $this->hasMany('App\Models\PlayerTeam');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function modality(){
        return $this->belongsTo('App\Models\Modality');
    }

    public function punctuation(){
        return $this->hasOne('App\Models\Punctuation');
    }
    public function games()
    {
        return $this->hasManyThrough('App\Models\Games','App\Models\GameTeam');
    }
}
