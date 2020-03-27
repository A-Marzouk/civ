@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme201" class="d-flex justify-content-center">
        <resume-theme-201 @if(isset($user)) :user="{{$user}}" @endif></resume-theme-201>
    </div>
@endsection
