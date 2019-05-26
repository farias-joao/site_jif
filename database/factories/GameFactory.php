<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Game;
use App\Models\Local;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'local_id' => function(){
            return Local::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
        'data'      => $faker->date(),
        'schedule'  =>  $faker->time()
    ];
});
