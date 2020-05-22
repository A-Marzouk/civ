@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme102" class="d-flex justify-content-center">
        <resume-theme-102  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-102>
    </div>
@endsection