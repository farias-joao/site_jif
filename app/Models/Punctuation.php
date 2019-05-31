<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Punctuation extends Model
{
    public function team(){
        return $this->belongsTo('App\Models\Team','team_id');
    }
}
