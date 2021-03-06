<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->realText(200),
        'user_id' => User::all()->random()->id,
        'post_id' => Post::all()->random()->id,
    ];
});
