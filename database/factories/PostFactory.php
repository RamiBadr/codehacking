<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use App\Post;
use App\User;
use Faker\Generator as Faker;


$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(7, 11),
        'user_id' => factory(User::class)->create(),
        'category_id' => factory(Category::class, 3)->create(),
        'photo_id' => $faker->numberBetween(1, 10),
        'category_id' => $faker->numberBetween(1, 4),
        'content' => $faker->paragraph(rand(10, 15), true),
        'slug' => $faker->slug()
    ];
});
