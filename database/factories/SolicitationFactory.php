<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Solicitation;
use Faker\Generator as Faker;

$factory->define(Solicitation::class, function (Faker $faker) {
    return [
        'status' => rand(0,1)
    ];
});
