<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerTeam extends Model
{
    public function team(){
        return $this->belongsTo('App\Models\Team');
    }

    public function player(){
        return $this->belongsTo('App\Models\Player');
    }
}
