<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promocode;
use Faker\Generator as Faker;

$factory->define(Promocode::class, function (Faker $faker) {
    return [
        'name' => 'betafree1',
        'free_period' => $faker->numberBetween(1,3) . ' month',
        'expires_at' => '2020-09-012',
        'is_active' => 1,
    ];
});
