@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme8" class="d-flex justify-content-center min-vh-100">
        <resume-theme-8 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-8>
    </div>
@endsection
