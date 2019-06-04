<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    public function teams(){
        return $this->hasMany('App\Models\Team','modality_id');
    }
    public function games(){
        return $this->hasMany('App\Models\Games');
    }
}
