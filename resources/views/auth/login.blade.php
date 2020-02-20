@extends('layouts.my-app')

@section('content')
    <div class="mt-5 mb-5">
        <div class="form-wrap justify-content-center" style="background-image: url(/images/welcome_landing_page/icons/new-background.png);">
            <div class="hold-form">
            <span class="title-form">
              Login
            </span>
                <div class="social-wrap">
                    <a href="/register/instagram"><img src="/images/welcome_landing_page/icons/instagram.png" alt=""></a>
                    <a href="/register/linkedin"><img src="/images/welcome_landing_page/icons/linkedin.png" alt=""></a>
                    <a href="/register/google"><img src="/images/welcome_landing_page/icons/google.png" alt=""></a>
                    <a href="/register/facebook"><img src="/images/welcome_landing_page/icons/facebook.png" alt=""></a>
                    <a href="/register/github"><img src="/images/welcome_landing_page/icons/github.png" alt=""></a>
                </div>
                <span class="title-inline">
                    or Log in with Email
                </span>
                <form class="v-form"  method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-12">
                                <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot d-flex flex-column">
                                                <input id="email" type="email"
                                                       class="w-100 @error('email') is-invalid @enderror" name="email"
                                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                                       class="w-100 @error('password') is-invalid @enderror" name="password"
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

                            <div class="form-check ml-2 pb-2 d-flex align-items-center">
                               <div>
                                   <input class="form-check-input" type="checkbox" name="remember"
                                          id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   <label class="form-check-label" for="remember">
                                       {{ __('Remember Me') }}
                                   </label>
                               </div>

                                @if (Route::has('password.request'))
                                    <div>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="col-sm-12 col-lg-12 col-12 NoDecor">
                                <button type="submit" class="btn-inset light__blue full"><i>Login</i></button>
                            </div>

                        </div>
                    </div>
                </form>
                <span class="title-inline">Don't have account? <a href="/register">Sign Up</a></span>
            </div>
        </div>
    </div>
@endsection
