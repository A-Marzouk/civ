@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme200" class="d-flex justify-content-center">
        <resume-theme-200  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-200>
    </div>
@endsection
