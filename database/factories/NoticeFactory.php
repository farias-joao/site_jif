<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Notice;
use App\User;
use Faker\Generator as Faker;

$factory->define(Notice::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence(3),
        'content'   => $faker->paragraph(3),
        'user_id'   => function(){
            return User::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        }

    ];
});
