<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Local;
use Faker\Generator as Faker;

$factory->define(Local::class, function (Faker $faker) {
    return [
        'alias' => $faker->sentence(3)
    ];
});
