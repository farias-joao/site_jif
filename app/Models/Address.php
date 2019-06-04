<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function local(){
        return $this->belongsTo('App\Models\Local','local_id');
    }
}
