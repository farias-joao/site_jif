<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Scoreboard;
use Faker\Generator as Faker;

$factory->define(Scoreboard::class, function (Faker $faker) {
    return [
        'points' => $faker->randomNumber(2),
        'round'  => rand(1,5)
    ];
});
