<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'user_id' => 2 ,
        'category' => $faker->text(30),
        'link' => $faker->url,
        'link_title' => $faker->url,
    ];
});

