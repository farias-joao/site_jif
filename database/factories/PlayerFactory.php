<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'name_player'   => $faker->name(),
        'ra_player'     => $faker->unique()->randomNumber(4)
    ];
});
