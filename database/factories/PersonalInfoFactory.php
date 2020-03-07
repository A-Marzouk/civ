<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PersonalInfo;
use Faker\Generator as Faker;

$factory->define(PersonalInfo::class, function (Faker $faker) {
    return [
        'user_id' => 2 ,
        'full_name' => $faker->name('male'),
        'email' => $faker->email,
        'designation' => $faker->jobTitle,
        'phone' => $faker->phoneNumber,
        'profile_pic' => $faker->text(30),
        'about' => $faker->text(150)
    ];
});


