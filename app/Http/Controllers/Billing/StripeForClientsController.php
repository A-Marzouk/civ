<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 10/28/2020
 * Time: 10:08 AM
 */

namespace App\Http\Controllers\Billing;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        $customer = $this->createOrFetchCustomer($request->client['email']);

        if (!$request->isRecurring) {
            return $this->makeOneTimePayment($request, $customer);
        }

        // BILLING THE CUSTOMER

        // one time payment

        // recurring payment
    }

    protected function createOrFetchCustomer($clientEmail)
    {
        // customer email check if existing


        // else create new:
        return StripeCustomer::create([
            'email' => $clientEmail,
            'payment_method' => 'pm_card_visa',
            'invoice_settings' => [
                'default_payment_method' => 'pm_card_visa',
            ],
        ]);
    }

    protected function makeOneTimePayment($request, $customer)
    {
        // create product
        $product = $this->createNewProduct('hire ' . $request->freelancer['default_resume_link']['title'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.');

        // create price for one time payment.
        $nowPrice = $this->createOneTimePriceForNowPayment($product->id, $request);

        // make checkout session
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

        // if the totalAmount is more than the pay now amount  make an invoice for the customer
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

        // after the success of a payment, we need to create a client, save the stripe customer id, add the payment to the client. add the pending payments
        // handle webhooks of paying any invoices or canceling or due of an invoice.

        return $session->id ;
    }

    protected function makeSubscriptionPayment()
    {

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

    protected function createNewProduct($productName)
    {
        return StripeProduct::create([
            'name' => $productName
        ]);
    }

    protected function createNewPrice($product_id, $request)
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


    protected function createClient()
    {

    }




}