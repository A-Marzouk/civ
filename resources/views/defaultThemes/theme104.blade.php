@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme104" class="d-flex justify-content-center">
        <resume-theme-104  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-104>
    </div>
@endsection