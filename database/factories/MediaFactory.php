<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'title' => $faker->text(25),
        'type' => 'audio',
        'transcript' =>$faker->text(150),
        'url' => $faker->url,
    ];
});
