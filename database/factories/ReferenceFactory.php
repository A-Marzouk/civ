<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reference;
use Faker\Generator as Faker;

$factory->define(Reference::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'name' => $faker->name,
        'title' => $faker->jobTitle,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'company' => $faker->company,
        'address' => $faker->address,
        'reference_text' => $faker->text(150),
        'notes' => $faker->text(150),
    ];
});
