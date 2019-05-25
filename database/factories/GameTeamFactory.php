<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\GameTeam;
use App\Models\Game;
use App\Models\Result;
use App\Models\Scoreboard;
use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(GameTeam::class, function (Faker $faker) {
    return [
        'game_id' => function () {
            return Game::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
        'team_id' => function () {
            return Team::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
    ];
});
