<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeUser;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Local;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => bcrypt('password'), // password
        'remember_token'    => Str::random(10),
        'siape'               => $faker->unique()->randomNumber(4),
        'cpf'               => $faker->unique()->randomNumber(4),
        'phone'               => $faker->unique()->phoneNumber(1),
        'local_id' => function (){
            return Local::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
    }
    ];
});
