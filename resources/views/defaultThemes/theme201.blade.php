@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme201" class="d-flex justify-content-center">
        <resume-theme-201 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-201>
    </div>
@endsection
