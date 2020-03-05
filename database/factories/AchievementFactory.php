<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Achievement;
use Faker\Generator as Faker;

$factory->define(Achievement::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'category' => $faker->text(25),
        'title' => $faker->text(25),
        'description' => $faker->text(125),
        'image_src' => $faker->imageUrl(),
        'url' => $faker->url,
    ];
});

