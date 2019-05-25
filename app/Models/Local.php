<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public function games(){
        return $this->hasMany('App\Models\Game');
    }

    public function address(){
        return $this->hasOne('App\Models\Address');
    }
}
