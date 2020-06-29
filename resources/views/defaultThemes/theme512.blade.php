@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme512" >
        <resume-theme-512  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-512>
    </div>
@endsection
