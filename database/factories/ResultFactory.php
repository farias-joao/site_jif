<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {
    return [
        'status_result' => rand(0,1)
    ];
});
