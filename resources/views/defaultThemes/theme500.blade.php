@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme500" >
        <resume-theme-500  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-500>
    </div>
@endsection
