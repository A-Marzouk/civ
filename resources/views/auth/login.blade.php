@extends('layouts.my-app')

@section('content')
    <div style="height: 100vh; align-items: center; display: flex; justify-content: center; background-image: url(/images/welcome_landing_page/icons/new-background.png);">
        <div class="form-wrap" id="loginForm">
            <login-form></login-form>
        </div>
    </div>
@endsection
