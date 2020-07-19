@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme1001">
        <resume-theme-1001 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-1001>
    </div>
@endsection
