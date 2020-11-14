<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Billing\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'payment_method' => 'Stripe',
        'payment_id' => 'payment_123456',
        'away_invoice_id' => 'invoice_123456',
        'status' => 'paid',
        'amount' => '125000',
        'notes' => 'Stripe One time payment | first part',
    ];
});
