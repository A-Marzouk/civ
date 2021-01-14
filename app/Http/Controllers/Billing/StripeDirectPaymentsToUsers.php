<?php


namespace App\Http\Controllers\Billing;


use App\Http\Controllers\Controller;
use App\PaymentMethod;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Stripe\Account;
use Stripe\AccountLink;

class StripeDirectPaymentsToUsers extends Controller
{

    public function CreateOnBoardUser(Request $request){
        $account = Account::create([
            'type' => 'standard',
            'email' => auth()->user()->email
        ]);

        Session::put('account_id',  $account->id);

        $origin = request()->headers->get('origin');

        $account_link_url = $this->generate_account_link($account->id, $origin);

        return [
            'url' => $account_link_url,
        ];
    }


    public function generate_account_link($account_id, $origin) {

        $account_link = AccountLink::create([
            'type' => 'account_onboarding',
            'account' => $account_id,
            'refresh_url' => "{$origin}/stripe/onboard-user/refresh",
            'return_url' => "{$origin}/stripe/onboard-user/return"
        ]);

        return $account_link->url;
    }

    public function refreshOnBoardUser(Request $request){
        if (empty(session::get('account_id'))) {
            return Redirect::to('/', '302');
        }

        $account_id = session::get['account_id'];

        $origin = request()->headers->get('origin');

        $account_link_url = $this->generate_account_link($account_id, $origin);
        return Redirect::to($account_link_url, '302');
    }

    public function returnAfterConnect(Request $request){
        // retrieve the account to test:
        $account_id =  session::get('account_id');

        if( ! $account_id){
            return Redirect::to('/hire-freelancer/cancel');
        }

        $userStripeAccount = Account::retrieve($account_id, []);

        // add or update payment method:
        $paymentMethod = PaymentMethod::where('stripe_account_id', $account_id)->first();

        if( ! $paymentMethod){
            PaymentMethod::create([
                'user_id' => auth()->user()->id,
                'stripe_account_id' => $account_id,
                'name' => 'stripe_connected',
                'resume_link_id' => auth()->user()->defaultResumeLink->id,
            ]);
        }else{
            $paymentMethod->update([
                'stripe_account_id' => $account_id,
            ]);
        }

        return Redirect::to('/add-account/success');
    }

    public function addAccountSuccess(){
        return view('Billing.account_added_success');
    }

    public function addAccountFail(){
        return view('Billing.account_added_fail');
    }
}