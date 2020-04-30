@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme503" >
        <resume-theme-503  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-503>
    </div>
@endsection
