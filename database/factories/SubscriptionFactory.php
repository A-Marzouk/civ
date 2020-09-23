<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'payment_method' => 'Stripe',
        'sub_status' => 'active',
        'sub_frequency' => 'monthly',
        'expires_at' => null,
        'promocode_id' => null
    ];
});
