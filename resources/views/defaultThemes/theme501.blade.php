@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme501" >
        <resume-theme-501  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-501>
    </div>
@endsection
