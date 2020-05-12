@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme110" class="d-flex justify-content-center">
        <resume-theme-110  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-110>
    </div>
@endsection