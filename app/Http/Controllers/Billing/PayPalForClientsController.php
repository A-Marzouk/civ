<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 11/9/2020
 * Time: 9:43 AM
 */

namespace App\Http\Controllers\Billing;


use App\Billing\paymentGatewayInfo;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use PayPal\Api\BillingInfo;
use PayPal\Api\Currency;
use PayPal\Api\InvoiceItem;
use PayPal\Api\MerchantInfo;
use PayPal\Api\Payer;
use PayPal\Api\Invoice;
use PayPal\Api\Agreement as Agreement;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PayPalForClientsController extends Controller
{
    private $apiContext;
    private $client_id;
    private $secret;
    private $monthly_plan_id;
    private $yearly_plan_id;

    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if (config('paypal.settings.mode') == 'live') {
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->monthly_plan_id = env('PAYPAL_LIVE_MONTHLY_PLAN_ID', '');
            $this->yearly_plan_id = env('PAYPAL_LIVE_YEARLY_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->monthly_plan_id = env('PAYPAL_SANDBOX_MONTHLY_PLAN_ID', '');
            $this->yearly_plan_id = env('PAYPAL_SANDBOX_YEARLY_PLAN_ID', '');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }


    public function customPayPalPayments(Request $request)
    {
        if (!$request->payment_info['isRecurring']) {
            $url = $this->makeOneTimePayment($request);
            return [
                'url' => $url
            ];
        }

        return $this->makeSubscriptionPayment($request);
    }


    // make one time payment:
    protected function makeOneTimePayment($request)
    {
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(URL::to('/') . '/paypal/hire-freelancer/success')
            ->setCancelUrl(URL::to('/') . '/paypal/hire-freelancer/cancel');

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($request->payment_info['toPayNowAmount']);

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Hire ' . $request->freelancer['default_resume_link']['title'] . ' For ' . $request->payment_info['numberOfHours'] . ' Hours.');

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        // Create payment with valid API context
        try {
            $payment->create($this->apiContext);
            $approvalUrl = $payment->getApprovalLink();
            return $approvalUrl;

        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            dd($ex);
        } catch (Exception $ex) {
            dd($ex);
        }


    }


    protected function makeSubscriptionPayment($request){

    }

    // return urls:
    public function success(Request $request)
    {
        // Get payment object by passing paymentId
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $result = $payment->execute($execution, $this->apiContext);
            $client = $this->createClient($result->payer->payer_info);
            $this->createPaymentHistory($client, $paymentId, $result);

            return view('billing.success');
        } catch (PayPalConnectionException $ex) {
            return view('billing.fail');
        } catch (Exception $ex) {
            return view('billing.fail');
        }
    }

    public function cancel()
    {
        dd('Payment cancelled');
    }


    // general
    protected function createClient($payerData)
    {

        $client = User::where('email', $payerData->email)->first();
        if ($client) {
            return $client;
        }

        $newClient = User::create([
            'name' => $payerData->first_name . ' ' . $payerData->last_name,
            'email' => $payerData->email,
            'username' => strstr($payerData->email, '@', true),
            'password' => Hash::make($payerData->email . '_civie_client'),
        ])->assignRole('client');

        paymentGatewayInfo::create([
            'user_id' => $newClient->id,
            'paypal_payer_id' => $payerData->payer_id
        ]);

        return $newClient;

    }

    protected function createPaymentHistory($client, $paymentId, $result)
    {

        $payment = \App\Billing\Payment::where('away_payment_id', $paymentId)->first();
        if ($payment) {
            return false;
        }

        \App\Billing\Payment::create([
            'away_payment_id' => $paymentId,
            'user_id' => $client->id,
            'amount' => $result->transactions[0]->amount->total,
            'payment_method' => 'paypal',
            'status' => 'paid',
            'notes' => 'Successfully paid.',
        ]);
    }

    protected function createInvoice($request)
    {
        $invoice = new Invoice();

        $merchant = new MerchantInfo();
        $merchant->setEmail('AhmedMarzouk266-buyer@gmail.com')
            ->setFirstName('mechant')
            ->setLastName('example');

        $invoice->setMerchantInfo($merchant);

        $billing_info = new BillingInfo();
        $billing_info->setEmail('AhmedMarzouk266-buyer@gmail.com')
            ->setFirstName('buyer')
            ->setLastName('test');

        $invoice->setBillingInfo(array($billing_info));

        $invoice_item = new InvoiceItem();

        $unit_price = new Currency();
        $unit_price->setCurrency('USD');
        $unit_price->setValue($request->payment_info['toPayLaterAmount']);


        $invoice_item->setName('Hire Freelancer with civ.ie | later payment')
            ->setQuantity(1)
            ->setUnitPrice($unit_price);


        $invoice->setItems(array($invoice_item));
        $invoice_item->setDescription('Hire Freelancer with civ.ie | later payment');

        try{
            $invoice->create($this->apiContext);
        }catch(PayPalConnectionException $ex){
            return $ex->getData();
        }
    }
}