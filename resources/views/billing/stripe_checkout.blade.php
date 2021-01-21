@extends('layouts.my-app')

@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <span id="stripe_public_key" style="display: none">{{config('services.stripe.key')}}</span>
    <script>
        let searchParams  = new URLSearchParams(window.location.search);
        let stripe_account_id = '';
        if(searchParams.has('stripe_account_id')){
             stripe_account_id = searchParams.get('stripe_account_id');
        }
        var stripe = Stripe(document.getElementById('stripe_public_key').innerText, {
            stripeAccount: stripe_account_id
        });

        if (searchParams.has('session_id')) {
            let session_id = searchParams.get('session_id');
            stripe.redirectToCheckout({
                sessionId: session_id
            }).then(function (result) {
                console.log(result.error.message);
            });
        }
    </script>
@endsection

