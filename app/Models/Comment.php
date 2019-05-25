<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function notice(){
        return $this->belongsTo('App\Models\Notice');
    }

    public function game(){
        return $this->belongsTo('App\Models\Game');
    }

    public function solicitation(){
        return $this->belongsTo('App\Models\Solicitation');
    }
}
