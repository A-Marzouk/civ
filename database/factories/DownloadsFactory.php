<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Download;
use Faker\Generator as Faker;

$factory->define(Download::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'url' => $faker->text(25),
        'label' => $faker->text(25),
        'title' => $faker->text(25),
        'order' => 1,
        'is_public' => $faker->boolean(),
    ];
});
