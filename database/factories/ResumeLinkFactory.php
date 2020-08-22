<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ResumeLink;
use Faker\Generator as Faker;

$factory->define(ResumeLink::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'url' => $faker->text(12),
        'title' => $faker->text(25)
    ];
});
