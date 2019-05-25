<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
}
