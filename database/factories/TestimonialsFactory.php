<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'name' => $faker->name,
        'company' => $faker->company,
        'title' => $faker->text,
        'description' => $faker->text,
    ];
});

