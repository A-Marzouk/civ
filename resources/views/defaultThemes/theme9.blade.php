@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme9" class="d-flex justify-content-center">
        <resume-theme-9  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-9>
    </div>
@endsection