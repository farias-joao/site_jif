<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Modality;
use Faker\Generator as Faker;

$factory->define(Modality::class, function (Faker $faker) {
    return [
        'name_modality' => $faker->sentence(1),
        'total_players' => $faker->randomDigit(2)

    ];
});
