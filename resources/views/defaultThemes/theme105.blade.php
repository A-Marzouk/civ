@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme105" class="d-flex justify-content-center">
        <resume-theme-105  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-105>
    </div>
@endsection