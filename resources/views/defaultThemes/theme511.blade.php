@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme511" >
        <resume-theme-511  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-511>
    </div>
@endsection
