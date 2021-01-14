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

class StripeDirectPayouts extends Controller
{

    public function directStripePayments(Request $request)
    {

        if (!$request->payment_info['isRecurring']) {

            $session_id = $this->makeOneTimePayment($request);

        } else {

            $session_id = $this->makeSubscriptionPayment($request);

        }

        $stripe_account_id = $this->getUserStripeConnectedAccountID();

        return [
            'url' => config('url') . '/stripe-checkout?session_id=' . $session_id . "&stripe_account_id=" . $stripe_account_id
        ];
    }


    // one time payments
    protected function makeOneTimePayment($request)
    {
        $stripe_account_id = $this->getUserStripeConnectedAccountID();

        if ($request->payment_info['payNow'] == 'true') {
            // pay now

            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'name' => 'Freelancer services | Hire ' . $request->freelancer['default_resume_link']['title'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.',
                        'amount' => $request->payment_info['toPayNowAmount'] * 100, // USD in cents,
                        'currency' => 'usd',
                        'quantity' => 1,
                    ]
                ],
                'success_url' => url('/') . '/hire-freelancer/success',
                'cancel_url' => url('/') . '/hire-freelancer/cancel',
            ], ['stripe_account' => $stripe_account_id]);
        }

        Session::put('hire_session_id', $session->id);

        return $session->id;
    }


    // subscriptions :
    protected function makeSubscriptionPayment($request)
    {
        $stripe_account_id = $this->getUserStripeConnectedAccountID();
        $customer = $this->createOrFetchCustomer($request, $stripe_account_id);

        $product = $this->createNewProduct('civ.ie | Hire ' .
            $request->freelancer['default_resume_link']['title'] .
            ' For ' . $request->payment_info['numberOfHours'] . ' Hours | ' .
            $request->payment_info['iterations'] . ' '
            . $request->payment_info['interval'] . 's');

        $subscriptionPrice = $this->createPriceForSubscription($product->id, $request);

        $session = StripeSession::create([
            'customer' => $customer->id,
            'mode' => 'setup',
            'payment_method_types' => ['card'],
            'success_url' => url('/') . '/hire-freelancer/success',
            'cancel_url' => url('/') . '/hire-freelancer/cancel',
        ]);

        \Stripe\Subscription::create([
            "customer" => $customer->id,
            "items" => [
                ["price" => $subscriptionPrice->id],
            ],
            "expand" => ["latest_invoice.payment_intent"],
        ], ["stripe_account" => $stripe_account_id]);

        Session::put('hire_sub_session_id', $session->id);

        return $session->id;
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
    protected function createOrFetchCustomer($request, $stripe_account_id)
    {
        $client = User::where('email', $request->client['email'])->first();
        $stripeID = $client->paymentGatewayInfo->stripe_customer_id ?? '';

        if ($stripeID) {
            return StripeCustomer::retrieve($stripeID);
        }

        $newStripeCustomer = StripeCustomer::create([
            'email' => 'paying.user@example.com',
            'source' => 'tok_mastercard',
        ]);

        $token = \Stripe\Token::create([
            'customer' => $newStripeCustomer->id
        ], [
            'stripe_account' => $stripe_account_id,
        ]);

        $connectedCustomer = StripeCustomer::create([
            'source' => $token->id,
        ], [
            'stripe_account' => $stripe_account_id,
        ]);

        $this->createClient($request, $connectedCustomer->id);

        return $connectedCustomer;
    }

    protected function createNewProduct($productName)
    {
        return StripeProduct::create([
            'name' => $productName
        ]);
    }

    protected function createClient($request, $stripe_customer_id)
    {
        $client = User::where('email', $request->client['email'])->first();

        if (!$client) {
            $client = User::create([
                'name' => $request->client['name'],
                'email' => $request->client['email'],
                'username' => strtolower(strstr($request->client['email'], '@', true)),
                'password' => Hash::make(strtolower($request->client['email'] . '_civie_client')),
            ])->assignRole('client');
        }

        $paymentGatewayInfo = paymentGatewayInfo::where('user_id', $client->id)->first();

        if (!$paymentGatewayInfo) {
            paymentGatewayInfo::create([
                'user_id' => $client->id,
                'stripe_customer_id' => $stripe_customer_id
            ]);
        }

        return $client;

    }

    protected function getUserStripeConnectedAccountID()
    {
        return auth()->user()->stripeConnectedAccountID();
    }

    public function stripeCheckout()
    {
        return view('Billing.stripe_checkout');
    }

    // notifications:
    public function firstPaymentSuccess()
    {
        return view('billing.success');
    }

    public function firstPaymentFail()
    {
        return view('billing.error');
    }


}