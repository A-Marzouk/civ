<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Summary;
use Faker\Generator as Faker;

$factory->define(Summary::class, function (Faker $faker) {
    return [
        'user_id' => 2 ,
        'objective' => $faker->text(150),
        'overview' =>  $faker->text(250),
    ];
});
