<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Education;
use Faker\Generator as Faker;

$factory->define(Education::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'institution_type' => $faker->text(25),
        'university_name' => $faker->text(25),
        'degree_title' => $faker->text(25),
        'date_from' => $faker->date(),
        'date_to' => $faker->date(),
        'present' => $faker->boolean(),
    ];
});
