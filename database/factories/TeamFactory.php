<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Modality;
use App\Models\Team;
use App\User;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'team_name'     => $faker->name(),
        'user_id'       => function(){
            return User::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
        'modality_id'   => function(){
            return Modality::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        }

    ];
});
