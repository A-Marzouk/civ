@extends('layouts.homepage.main')

@section('content')

    <div class="homepage-navbar transparent-bar">
        <a href="/">
            <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-011.svg" alt="logo"/>
        </a>
    </div>

    <div id="AuthForm">
        <auth-form></auth-form>
    </div>
@endsection
