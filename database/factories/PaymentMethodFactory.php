<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'resume_link_id' => 2,
        'name' => 'Stripe',
        'link' => 'https://stripe.com',
        'is_primary' => true,
        'is_active' => true,
    ];
});
