@extends('layouts.my-app')

@section('content')


    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_ONs0RLUvvsJy9P3XWHOkCWRB');
        let searchParams = new URLSearchParams(window.location.search);

        if (searchParams.has('session_id')) {
            let param = searchParams.get('session_id');
            stripe.redirectToCheckout({
                sessionId: param
            }).then(function (result) {
                // If `redirectToCheckout` fails due to a browser or network
                // error, display the localized error message to your customer
                // using `result.error.message`.
                console.log(result.error.message);
            });
            console.log(param);
        }else{
            console.log('coming');
        }
    </script>
@endsection

