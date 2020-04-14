@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme3" class="d-flex justify-content-center">
        <resume-theme-3  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-3>
    </div>
@endsection
