<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectImage;
use Faker\Generator as Faker;

$factory->define(ProjectImage::class, function (Faker $faker) {
    return [
        'src' => 'https://tnthomeimprovements.com/wp-content/uploads/2019/08/placeholder.png',
        'is_main' => 0,
        'project_id' => $faker->numberBetween(1,4)
    ];
});
