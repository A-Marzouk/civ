<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WorkEx;
use Faker\Generator as Faker;

$factory->define(WorkEx::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'company_name' => $faker->text(25),
        'job_title' => $faker->text(25),
        'description' => $faker->text(125),
        'website' => $faker->text(25),
        'date_from' => $faker->date(),
        'date_to' => $faker->date(),
        'present' => $faker->boolean(),
    ];
});
