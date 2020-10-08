<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

// Used to process plans

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Payer;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Agreement as Agreement;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PaypalController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $monthly_plan_id;
    private $yearly_plan_id;

    // Create a new instance with our paypal credentials
    public function __construct()
    {

        $this->middleware(['auth']);

        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
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

    public function create_plan($plan_period){

         // plan_period Month or Year
        $amount = 5 ;
        if($plan_period === 'Year'){
            $amount = 50 ;
        }

        // Create a new billing plan
        $plan = new Plan();
        $plan->setName('CIV '. $plan_period .'ly Billing')
            ->setDescription( $plan_period .'ly Subscription to CIV')
            ->setType('infinite');

        // set trial paymenty definition:
        $trialPaymentDefinition = new PaymentDefinition();
        $trialPaymentDefinition->setName('Free Trial')
            ->setType('TRIAL')
            ->setFrequency('DAY')
            ->setFrequencyInterval('1')
            ->setCycles('7')
            ->setAmount(new Currency(array('value' => '0.00', 'currency' => 'USD')));

        // Set billing plan definitions
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency($plan_period)
            ->setFrequencyInterval('1')
            ->setCycles('0')
            ->setAmount(new Currency(array('value' => $amount, 'currency' => 'USD')));

        // Set merchant preferences
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(url('/') . '/subscribe/paypal/return')
            ->setCancelUrl(url('/') . '/subscribe/paypal/return')
            ->setAutoBillAmount('yes')
            ->setInitialFailAmountAction('CONTINUE')
            ->setMaxFailAttempts('0');

        $plan->setPaymentDefinitions(array($trialPaymentDefinition,$paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        //create the plan
        try {
            $createdPlan = $plan->create($this->apiContext);

            try {
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                    ->setPath('/')
                    ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $createdPlan->update($patchRequest, $this->apiContext);
                $plan = Plan::get($createdPlan->getId(), $this->apiContext);

                // Output plan id
                echo 'Plan ID:' . $plan->getId();
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                die($ex);
            }
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    } // we use it only twice to create our plans

    public function subscribePayPalMonthly(){
        // Create new agreement
        Session::put('plan', 'monthly');

        $agreement = new Agreement();
        $agreement->setName('civ.ie Monthly Subscription Agreement')
            ->setDescription('Monthly Subscription - 5$ | 7 days free trial')
            ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($this->monthly_plan_id);
        $agreement->setPlan($plan);

        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
            // Create agreement
            $agreement = $agreement->create($this->apiContext);

            // Extract approval URL to redirect user
            $approvalUrl = $agreement->getApprovalLink();

            return redirect($approvalUrl);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    }

    public function subscribePayPalYearly(){
        Session::put('plan', 'yearly');
        // Create new agreement
        $agreement = new Agreement();
        $agreement->setName('civ.ie Yearly Subscription Agreement')
            ->setDescription('Yearly Subscription - 50$ | 7 days free trial')
            ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($this->yearly_plan_id);
        $agreement->setPlan($plan);

        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
            // Create agreement
            $agreement = $agreement->create($this->apiContext);

            // Extract approval URL to redirect user
            $approvalUrl = $agreement->getApprovalLink();

            return redirect($approvalUrl);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    }

    public function paypalReturn(Request $request){

        $token = $request->token;
        $agreement = new Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);
            $user = Auth::user();
            Subscription::create([
                'payment_method' => 'paypal',
                'sub_frequency' => Session::get('plan'),
                'sub_status' => 'active',
                'paypal_agreement_id' => $result->id,
                'user_id' => $user->id
            ]);


            return redirect(url('/') . '/resume-builder?redirect_from=paypal&status=success');

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            return redirect(url('/') . '/resume-builder?redirect_from=paypal&status=fail');
        }
    }


}
