@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme204" class="d-flex justify-content-center">
        <resume-theme-204 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-204>
    </div>
@endsection
