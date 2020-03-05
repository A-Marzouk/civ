<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'user_id' => 2 ,
        'name' => $faker->text(30),
        'description' => $faker->text(150),
        'link' => $faker->url
    ];
});
