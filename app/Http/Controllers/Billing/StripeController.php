<?php

namespace App\Http\Controllers\Billing;

use App\Billing\StripePlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;
class StripeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        return view('subscription');
    }

    public function subscribePage(){

        if(auth()->user()->can('test.builder.users') || env('APP_ENV') === 'local' || auth()->user()->isSubscribed()){
            return redirect('/resume-builder');
        }

        return view('resume_builder.subscription_page');
    }

    public function subscribeStripe(Request $request)
    {
        $plan = StripePlan::where('name', $request->plan)->first();

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'subscription_data' => [
                'items' => [
                    ['plan' => $plan->price_id]
                ],
            ],
            'success_url' => url('/') . '/subscription/success',
            'cancel_url' =>  url('/') . '/subscription/cancel',
        ]);

        Session::put('session_id',  $session->id);
        Session::put('plan', $request->plan);


        return redirect(url('/') . '/subscription?session_id=' . $session->id);
    }

    public function subscriptionSuccess(){
        $sessionInfo = StripeSession::retrieve(Session::get('session_id'));
        auth()->user()->activate($sessionInfo, session::get('plan'));
        return redirect(url('/') . '/resume-builder?redirect_from=stripe&status=success');
    }

    public function cancel(){
        return redirect(url('/') . '/resume-builder?redirect_from=stripe&status=cancel');
    }

}
