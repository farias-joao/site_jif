<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Comment;
use App\Models\Notice;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'author_comment_name' => $faker->name(),
        'content'             => $faker->paragraph(4),
        'notice_id'           => function(){
            return Notice::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
        'game_id'             => null
    ];
});
