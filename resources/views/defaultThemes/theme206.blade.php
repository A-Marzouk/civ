@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme206" class="d-flex justify-content-center">
        <resume-theme-206 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-206>
    </div>
@endsection
