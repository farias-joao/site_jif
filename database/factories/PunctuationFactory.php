<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Punctuation;
use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Punctuation::class, function (Faker $faker) {
    return [
           'total_points' => $faker->randomNumber(2),
           'team_id'      => function(){
               return Team::orderByRaw("RAND()")
                   ->take(1)
                   ->first()
                   ->id;
           },
           'total_wins'   => $faker->randomNumber(2),
           'total_loses'  => $faker->randomNumber(2),
           'total_draw'   => $faker->randomNumber(2)
       ];
});
