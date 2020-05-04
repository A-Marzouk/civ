@extends('layouts.my-app')

@section('content')
    <div class="mt-5 mb-5">
        <div class="form-wrap justify-content-center" style="background-image: url(/images/welcome_landing_page/icons/new-background.png);">
            <div class="hold-form">
            <span class="title-form">
              Create new account
            </span>
                <div class="social-wrap">
                    <a href="/register/instagram"><img src="/images/welcome_landing_page/icons/social_icons/instagram.png" alt=""></a>
                    <a href="/register/linkedin"><img src="/images/welcome_landing_page/icons/social_icons/linkedin.png" alt=""></a>
                    <a href="/register/google"><img src="/images/welcome_landing_page/icons/social_icons/google.png" alt=""></a>
                    <a href="/register/facebook"><img src="/images/welcome_landing_page/icons/social_icons/facebook.png" alt=""></a>
                    <a href="/register/github"><img src="/images/welcome_landing_page/icons/social_icons/github.png" alt=""></a>
                </div>
                <span class="title-inline">
                    or Sign up with Email
                </span>
                <form class="v-form"  method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot d-flex flex-column">
                                                <input id="name" type="text"
                                                       class="w-100 @error('name') is-invalid @enderror" name="name"
                                                       value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot d-flex flex-column">
                                                <input id="email" type="email"
                                                       class="w-100 @error('email') is-invalid @enderror" name="email"
                                                       value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot d-flex flex-column">
                                                <input id="password" type="password"
                                                       class="w-100 @error('password') is-invalid @enderror" name="password" placeholder="Password"
                                                       required autocomplete="current-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot d-flex flex-column">
                                                <input id="password-confirm"  type="password"
                                                       class="w-100 @error('password') is-invalid @enderror" name="password_confirmation"
                                                       required autocomplete="new-password" placeholder="Confirm password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-lg-12 col-12 NoDecor">
                                <button type="submit" class="btn-inset light__blue full"><i>Sign Up</i></button>
                            </div>

                        </div>
                    </div>
                </form>
                <span class="title-inline">Already have account? <a href="/login">Login</a></span>
            </div>
        </div>
    </div>
@endsection
