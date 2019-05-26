<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TypeUser;
use Faker\Generator as Faker;

$factory->define(TypeUser::class, function (Faker $faker) {
    return [
        'type'          => $faker->name(),
        'permission'    => $faker->randomDigit()
    ];
});
