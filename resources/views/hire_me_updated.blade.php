@extends('layouts.theme-vuetify')

@section('content')
    <div id="HireMeModalUpdated">
        <hire-me-updated :user="{{$user}}"></hire-me-updated>
    </div>
@endsection
