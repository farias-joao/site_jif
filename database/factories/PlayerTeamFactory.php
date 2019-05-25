<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Player;
use App\Models\Team;
use App\Models\PlayerTeam;
use Faker\Generator as Faker;

$factory->define(PlayerTeam::class, function (Faker $faker) {
    return [
        'player_id'     => function(){
            return Player::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
    'team_id'           => function(){
        return Team::orderByRaw("RAND()")
            ->take(1)
            ->first()
            ->id;
    }
    ];
});
