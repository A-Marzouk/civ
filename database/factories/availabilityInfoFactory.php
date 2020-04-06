<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AvailabilityInfo;
use Faker\Generator as Faker;

$factory->define(AvailabilityInfo::class, function (Faker $faker) {
    return [
        'available_hours' => $faker->numberBetween(30,60),
        'available_hours_frequency' => 'weekly',
    ];
});
