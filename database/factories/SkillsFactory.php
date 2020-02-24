<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Skill;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'user_id' => 2 ,
        'title' => $faker->text(30),
        'category' => 'programming_languages',
        'percentage' => $faker->numberBetween(50,100)
    ];
});
