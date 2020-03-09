<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaymentInfo;
use Faker\Generator as Faker;

$factory->define(PaymentInfo::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'salary' => $faker->numberBetween(0,100),
        'salary_frequency' => 'hourly',
        'available_hours' => $faker->numberBetween(30,60),
        'available_hours_frequency' => 'weekly',
    ];
});

