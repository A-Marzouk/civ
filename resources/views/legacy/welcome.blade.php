@extends('layouts.homepage.main')

@section('content')

    <div class="homepage-navbar">
        <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-011.svg" alt="logo"/>
        <div class="nav-btns">
            <a class="login-btn" href="/login?tab=signin">Log in</a>
            <a class="btn-appbar-register" href="/register">Sign up</a>
        </div>
    </div>

    <div id="welcomeView">
        <div>
            <div class="resume-title" align="center">Make Your Online Resume</div>
        </div>
        <div class="d-flex justify-center w-100">
            <div class="resume-subtitle">
                We believe that resume’s can look beautiful, we help freelancers, contractors & jobseekers create stunning online resume’s.
            </div>
        </div>

        <welcome-view></welcome-view>
    </div>

@endsection
