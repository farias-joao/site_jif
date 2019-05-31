<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    public function comment(){
        return $this->hasOne('App\Models\Comment','solicitation_id');
    }
}
