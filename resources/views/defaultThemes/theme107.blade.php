@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme107" class="d-flex justify-content-center">
        <resume-theme-107  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-107>
    </div>
@endsection