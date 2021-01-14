@extends('layouts.theme-vuetify')

@section('content')

    <div class="notification-page-content">

        <div class="navbar">
            <a href="/">
                <img src="/images/civie_logo-blue1.svg" alt="logo">
            </a>
        </div>

        <div class="notification">
            <div class="notification-image">
                <img src="/images/new_resume_builder/error-icon.svg" alt="error icon">
            </div>
            <div class="notification-message">
                We are sorry! your Stripe account was not added!<br/>
                Please check your account status or contact us for help.
            </div>
        </div>

    </div>

@endsection