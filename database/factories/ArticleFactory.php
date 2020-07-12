<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,8),
        'user_id' => rand(1,10),
        'title' => $faker->word,
        'description' => $faker->text($maxNbChars = 400)
    ];
});
