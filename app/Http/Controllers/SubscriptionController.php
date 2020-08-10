<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\{Plan, Product, Stripe, Charge, Customer};

class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        return view('subscription');
    }


    public function subscribeStripe(Request $request)
    {

        $plan = $request->plan === 'monthly' ? env('STRIPE_LIVE_MONTHLY_PLAN_ID') : env('STRIPE_LIVE_YEARLY_PLAN_ID') ;
        Session::put('plan', $plan);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],

            'subscription_data' => [
                'items' => [
                    [
                        'plan' => $plan,
                    ]
                ],
            ],
            'success_url' => url('/') . '/subscription/success',
            'cancel_url' =>  url('/') . '/subscription/cancel',
        ]);

        return redirect(url('/') . '/subscription?session_id=' . $session->id);
    }


    public function subscriptionSuccess(Request $request){
        // if success we create a subscription
        Subscription::create([
            'payment_method' => 'stripe',
            'sub_frequency' => Session::get('plan'),
            'sub_status' => 'active',
            'user_id' => auth()->user()->id
        ]);

        return redirect(url('/') . '/resume-builder?redirect_from=stripe&status=success');
    }

    public function cacnel(){
        return redirect(url('/') . '/resume-builder?redirect_from=stripe&status=cancel');
    }

}
