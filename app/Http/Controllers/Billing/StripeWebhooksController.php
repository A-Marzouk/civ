<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 9/22/2020
 * Time: 10:51 AM
 */

namespace App\Http\Controllers\Billing;


use App\Billing\Payment;
use App\Http\Controllers\Controller;
use App\User;

class StripeWebhooksController extends Controller
{

    public function handle(){

        // calls the method according to the event payload came from Stripe.
        $payload = request()->all();
        $method =  $this->eventToMethod($payload['type']);

        if(method_exists($this,$method)){
            $this->$method($payload);
        }

        return [
            'status' => 'success'
        ];
    }

    public function eventToMethod($event){
        return 'on' . studly_case(str_replace('.', '_', $event));
    }

    public function onCustomerSubscriptionDeleted($payload){
        User::byStripeCustomerId($payload['data']['object']['customer'])->deactivate();
    }

    public function onChargeSucceeded($payload){
        $client =  User::byStripeCustomerId($payload['data']['object']['customer']);
        // add success payment history.
        Payment::create([
            'user_id' => $client->id,
            'amount' => $payload['data']['object']['amount'],
            'payment_method' => 'stripe',
            'status' => 'paid',
            'notes' => 'Successfully paid.',
        ]);
    }

}