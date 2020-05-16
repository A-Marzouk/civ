@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme505" >
        <resume-theme-505  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-505>
    </div>
@endsection
