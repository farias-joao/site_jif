<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public function games(){
        return $this->hasMany('App\Models\Game','local_id');
    }

    public function address(){
        return $this->hasOne('App\Models\Address','local_id');
    }
}
