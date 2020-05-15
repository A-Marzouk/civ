@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme103" class="d-flex justify-content-center">
        <resume-theme-103  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-103>
    </div>
@endsection