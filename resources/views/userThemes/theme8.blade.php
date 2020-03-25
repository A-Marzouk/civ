@extends('layouts.my-app')

@section('content')
    <div id="userTheme8" class="d-flex justify-content-center">
        <user-theme-8 :user="{{$user}}"></user-theme-8>
    </div>
@endsection
