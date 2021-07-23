<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Post_Tag;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(Post_Tag::class, function (Faker $faker) {
    return [
        'post_id' => Post::all()->random()->id,
        'tag_id'=> Tag::all()->random()->id
    ];
});
