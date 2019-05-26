<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Address;
use App\Models\Local;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street'        => $faker->streetName(),
        'number'        => $faker->randomNumber(3),
        'neighborhood'  => $faker->sentence(3),
        'local_id'      => function(){
            return Local::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        }
    ];
});
