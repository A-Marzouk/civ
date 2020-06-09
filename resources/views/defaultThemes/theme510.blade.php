@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme510" >
        <resume-theme-510  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-510>
    </div>
@endsection
