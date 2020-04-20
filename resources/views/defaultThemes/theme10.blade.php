@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme10" class="d-flex justify-content-center">
        <resume-theme-10  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-10>
    </div>
@endsection
