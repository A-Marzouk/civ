@extends('layouts.my-app')

@section('content')
    <div class="container">
        <div id="passportClients">
            <passport-clients></passport-clients>
        </div>
        <div id="passportAuthorizedClients">
            <passport-authorized-clients></passport-authorized-clients>
        </div>
        <div id="passportPersonalAccessTokens">
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
@endsection
