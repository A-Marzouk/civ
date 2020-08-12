<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promocode;
use Faker\Generator as Faker;

$factory->define(Promocode::class, function (Faker $faker) {
    return [
        'name' => 'betafree1',
        'free_period' => 'month',
        'expires_at' => '12-09-2020',
        'is_active' => 1,
    ];
});
