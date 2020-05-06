@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme5" >
        <resume-theme-5 page="resume" @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-5>
    </div>
@endsection
