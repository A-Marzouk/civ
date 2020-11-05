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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stripe\Product as StripeProduct;
use Stripe\Price as StripePrice;
use Stripe\Customer as StripeCustomer;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;
use Stripe\InvoiceItem as StripeInvoiceItem;
use Stripe\Invoice as StripeInvoice;

class StripeForClientsController extends Controller
{

    public function customStripePayments(Request $request)
    {

        $customer = $this->createOrFetchCustomer($request);

        if ( ! $request->isRecurring) {
            return $this->makeOneTimePayment($request, $customer);
        }

    }

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



    // one time payments
    protected function makeOneTimePayment($request, $customer)
    {
        $product = $this->createNewProduct('hire ' . $request->freelancer['default_resume_link']['title'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.');

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
    protected function makeSubscription($request, $customer){

    }

    protected function createNewPriceForSubscription($product_id, $request)
    {
        return StripePrice::create([
            'product' => $product_id,
            'unit_amount' => $request->payment_info['toPayNowAmount'], // USD in cents
            'currency' => 'usd',
            // pass interval only if recurring payment.
            'recurring' => [
                'interval' => 'month',
            ],
        ]);
    }


    // general:
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



    // success:
    public function firstPaymentSuccess(){
        dd('Thank you! your payment went through');
    }


}