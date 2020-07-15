@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme203" class="d-flex justify-content-center">
        <resume-theme-203  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-203>
    </div>
@endsection
