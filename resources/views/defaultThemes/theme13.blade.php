@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme13" class="d-flex justify-content-center">
        <resume-theme-13  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-13>
    </div>
@endsection