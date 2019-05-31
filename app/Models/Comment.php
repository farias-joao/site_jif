<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function notice(){
        return $this->belongsTo('App\Models\Notice','notice_id');
    }

    public function game(){
        return $this->belongsTo('App\Models\Game','game_id');
    }

    public function solicitation(){
        return $this->belongsTo('App\Models\Solicitation','solicitation_id');
    }
}
