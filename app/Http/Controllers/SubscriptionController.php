<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\{Plan, Product, Stripe, Charge, Customer};
use Stripe\Subscription as StripeSubscription;


class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        if(Auth::user()->hasRole('admin')){
            return redirect('/workforce-admin');
        }

        return view('subscription');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function subscribe(Request $request)
    {

        $plan = $request->plan;

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

        return redirect('http://localhost:8080/subscription?session_id=' . $session->id);
    }


    public function subscriptionSuccess(Request $request){
        // if success we create a subscription
        Subscription::create([
            'payment_method' => 'stripe',
            'sub_frequency' => 'monthly',
            'sub_status' => 'active',
            'user_id' => auth()->user()->id
        ]);

        return redirect('http://localhost:8080/resume-builder');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
