@extends('layouts.my-app')

@section('content')
    <div id="userTheme201" class="d-flex justify-content-center">
        <user-theme-201 :user="{{$user}}"></user-theme-201>
    </div>
@endsection
