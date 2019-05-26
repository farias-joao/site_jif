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
        return $this->hasMany('App\Models\Comment');
    }

    public function gameteams()
    {
        return $this->hasMany('App\Models\GameTeam');
    }

    public function local()
    {
        return $this->belongsTo('App\Models\Local');
    }

    public function results()
    {
        return $this->hasManyThrough('App\Models\Result','App\Models\GameTeam');
    }
}
