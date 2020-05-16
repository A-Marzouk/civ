@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme112" class="d-flex justify-content-center">
        <resume-theme-112  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-112>
    </div>
@endsection