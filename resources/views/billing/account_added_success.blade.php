@extends('layouts.theme-vuetify')

@section('content')

    <div class="notification-page-content">

        <div class="navbar">
            <a href="/">
                <img src="/images/civie_logo-blue1.svg" alt="check green">
            </a>
        </div>

        <div class="notification">
            <div class="notification-image">
                <img src="/icons/hire-modal/check-circle.svg" alt="check green">
            </div>
            <div class="notification-message">
                Thank you! your Stripe account has been successfully connected.<br/>
            </div>
        </div>

    </div>

@endsection