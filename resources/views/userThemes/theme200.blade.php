@extends('layouts.my-app')

@section('content')
    <div id="userTheme200" class="d-flex justify-content-center">
        <user-theme-200 :user="{{$user}}"></user-theme-200>
    </div>
@endsection
