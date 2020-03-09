<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Import;
use Faker\Generator as Faker;

$factory->define(Import::class, function (Faker $faker) {
    return [
        'user_id' =>2,
        'title' => $faker->text(30),
        'category' => $faker->text(30),
        'url' => $faker->url
    ];
});
