@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme11" class="d-flex justify-content-center">
        <resume-theme-11  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-11>
    </div>
@endsection