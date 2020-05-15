@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme106" class="d-flex justify-content-center">
        <resume-theme-106  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-106>
    </div>
@endsection