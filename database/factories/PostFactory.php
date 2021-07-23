<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word(10),
        'description' => $faker->realText(200),
        'content'=> $faker->realText(10000),
        'category_id' => Category::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'image' => Storage::disk('public')->putFile('images/posts', $faker->image())
    ];
});
