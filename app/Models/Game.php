<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function getDataAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getScheduleAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','game_id');
    }

    public function gameteams()
    {
        return $this->hasMany('App\Models\GameTeam','game_id');
    }

    public function local()
    {
        return $this->belongsTo('App\Models\Local','local_id');
    }

    public function results()
    {
        return $this->hasManyThrough('App\Models\Result','App\Models\GameTeam');
    }
    public function modality()
    {
        return $this->belongsTo('App\Models\Modality');
    }
    public function rounds(){
        return $this->hasMany('App\Models\Round');
    }

    public function teams(){
        return $this->belongsToMany('App\Models\Team','game_teams','game_id','team_id');
    }
}
