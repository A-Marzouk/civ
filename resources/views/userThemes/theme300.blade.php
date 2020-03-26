@extends('layouts.my-app')

@section('content')
    <div id="userTheme300" class="d-flex justify-content-center">
        <user-theme-300 :user="{{$user}}"></user-theme-300>
    </div>
@endsection
