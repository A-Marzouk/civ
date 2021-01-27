@extends('layouts.homepage.main')

@section('content')

    <div class="homepage-navbar">
        <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-011.svg" alt="logo" />
        <a class="btn-appbar-login" href="/login">Login</a>
    </div>

    <div id="welcomeView">
        <welcome-view></welcome-view>
    </div>
@endsection
