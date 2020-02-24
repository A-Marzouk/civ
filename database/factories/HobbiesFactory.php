<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hobby;
use Faker\Generator as Faker;

$factory->define(Hobby::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'title' => $faker->text(25),
        'category' => 'Sports',
    ];
});
