@extends('layouts.my-app')

@section('content')
    <div id="userTheme3" class="d-flex justify-content-center">
        <user-theme-3 :user="{{$user}}"></user-theme-3>
    </div>
@endsection
