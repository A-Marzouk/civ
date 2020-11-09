<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 10/28/2020
 * Time: 10:08 AM
 */

namespace App\Http\Controllers\Billing;


use App\Billing\paymentGatewayInfo;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stripe\Product as StripeProduct;
use Stripe\Price as StripePrice;
use Stripe\Customer as StripeCustomer;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;
use Stripe\InvoiceItem as StripeInvoiceItem;
use Stripe\Invoice as StripeInvoice;
use Stripe\SubscriptionSchedule as StripeSubscriptionSchedule;

class StripeForClientsController extends Controller
{

    public function customStripePayments(Request $request)
    {

        $customer = $this->createOrFetchCustomer($request);

        if ( ! $request->payment_info['isRecurring']) {
            $session_id =  $this->makeOneTimePayment($request, $customer);
            return [
                'url' => config('url') . '/client-subscription?session_id=' . $session_id
            ];
        }

        $session_id = $this->makeSubscriptionPayment($request, $customer);
        return [
            'url' => config('url') . '/client-subscription?session_id=' . $session_id
        ];

    }



    // one time payments
    protected function makeOneTimePayment($request, $customer)
    {
        $product = $this->createNewProduct('Hire ' . $request->freelancer['default_resume_link']['title'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.');

        $nowPrice = $this->createOneTimePriceForNowPayment($product->id, $request);

        $session = StripeSession::create([
            'customer' => $customer->id,
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => $nowPrice->id,
                    'quantity' => 1,
                ]
            ],
            'success_url' => url('/') . '/hire-freelancer/success',
            'cancel_url' =>  url('/') . '/hire-freelancer/cancel',
        ]);

        Session::put('hire_session_id',  $session->id);

        if($request->percentage < 100){
            $laterPrice = $this->createOneTimePriceForLaterPayment($product->id, $request);

            StripeInvoiceItem::create([
                'customer' => $customer->id,
                'price' => $laterPrice->id,
            ]);

            StripeInvoice::create([
                'customer' => $customer->id,
                'auto_advance' => true,
                'collection_method' => 'send_invoice',
                'description' => 'Second part of payment | Hiring freelancer with civ.ie',
                'days_until_due' => 7
            ]);
        }

        return $session->id ;
    }

    protected function createOneTimePriceForNowPayment($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayNowAmount'] * 100, // USD in cents
            'currency' => 'usd',
        ]);
    }

    protected function createOneTimePriceForLaterPayment($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayLaterAmount'] * 100, // USD in cents
            'currency' => 'usd',
        ]);
    }



    // subscriptions :
    protected function makeSubscriptionPayment($request, $customer){
        $product = $this->createNewProduct('civ.ie | Hire ' .
            $request->freelancer['default_resume_link']['title'] .
            ' For ' . $request->payment_info['numberOfHours'] . ' Hours | ' .
            $request->payment_info['iterations'] . ' '
            . $request->payment_info['interval'] . 's');

        $nowSubscriptionPrice = $this->createPriceForSubscription($product->id, $request);

        $session = StripeSession::create([
            'customer' => $customer->id,
            'mode' => 'subscription',
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => $nowSubscriptionPrice->id,
                    'quantity' => 1,
                ]
            ],
            'success_url' => url('/') . '/hire-freelancer/success',
            'cancel_url' =>  url('/') . '/hire-freelancer/cancel',
        ]);

        Session::put('hire_sub_session_id',  $session->id);

        if($request->percentage < 100){

            $laterSubscriptionPrice = $this->createPriceForSubscriptionLaterPayment($product->id, $request);

            $startDate = new Carbon($request->payment_info['toPayLaterDate']);

            StripeSubscriptionSchedule::create([
                'customer' =>  $customer->id,
                'start_date' => $startDate->timestamp,
                'end_behavior' => 'cancel',
                'phases' => [
                    [
                        'items' => [
                            [
                                'price' => $laterSubscriptionPrice->id,
                                'quantity' => 1,
                            ],
                        ],
                        'iterations' => $request->payment_info['iterations'],
                    ],
                ],
            ]);

        }

        return $session->id ;
    }

    protected function createPriceForSubscription($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayNowAmount'] * 100, // USD in cents
            'currency' => 'usd',
            // pass interval only if recurring payment.
            'recurring' => [
                'interval' => $request->payment_info['interval'],
            ],
        ]);
    }

    protected function createPriceForSubscriptionLaterPayment($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayLaterAmount'] * 100, // USD in cents
            'currency' => 'usd',
            // pass interval only if recurring payment.
            'recurring' => [
                'interval' => $request->payment_info['interval'],
            ],
        ]);
    }


    // general:
    protected function createOrFetchCustomer($request)
    {
        $client   = User::where('email', $request->client['email'])->first();
        $stripeID = $client->paymentGatewayInfo->stripe_customer_id ?? '' ;

        if($stripeID){
            return StripeCustomer::retrieve($stripeID);
        }

        $newStripeCustomer = StripeCustomer::create([
            'email' => $request->client['email'],
            'payment_method' => 'pm_card_visa',
            'invoice_settings' => [
                'default_payment_method' => 'pm_card_visa',
            ],
        ]);

        $this->createClient($request, $newStripeCustomer->id);

        return $newStripeCustomer ;
    }

    protected function createNewProduct($productName)
    {
        return StripeProduct::create([
            'name' => $productName
        ]);
    }

    protected function createClient($request, $stripe_customer_id)
    {
        $newClient =  User::create([
            'name' => $request->client['name'],
            'email' => $request->client['email'],
            'username' => strstr($request->client['email'], '@', true),
            'password' => Hash::make($request->client['email'] . '_civie_client'),
        ])->assignRole('client');

        paymentGatewayInfo::create([
            'user_id' => $newClient->id,
            'stripe_customer_id' => $stripe_customer_id
        ]);

    }

    public function clientSubscription(){
        return view('subscription');
    }



    // notifications:
    public function firstPaymentSuccess(){
        dd('Thank you! your payment went through');
    }

    public function firstPaymentFail(){
        dd('Sorry! your payment did not go through');
    }


}