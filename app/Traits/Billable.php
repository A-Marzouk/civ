<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 9/22/2020
 * Time: 10:54 AM
 */

namespace App\Traits;


use App\Subscription;
use Carbon\Carbon;

trait Billable
{

    public function activate($sessionInfo, $frequency){
        if($this->isSubscribed()){
            return;
        }

        if($this->subscription){
            $this->subscription->update([
                'sub_status' => 'active',
                'expires_at' => null
            ]);
            return;
        }

        Subscription::create([
            'payment_method' => 'stripe',
            'sub_frequency' => $frequency,
            'sub_status' => 'active',
            'stripe_customer_id' => $sessionInfo->customer,
            'stripe_subscription_id' => $sessionInfo->subscription,
            'user_id' => auth()->user()->id
        ]);

    }


    public function deactivate(){
        $this->subscription->update([
            'sub_status' => 'canceled',
            'expires_at' => Carbon::now(),
        ]);

    }

    public function isSubscribed(){
        $sub = $this->subscription;

        if($sub){
            return $sub->isActive() && ! $sub->isExpired() ;
        }

        return false;
    }

    public static function byStripeCustomerId($id){
        return Subscription::where('stripe_customer_id', $id)->first()->user;
    }

}