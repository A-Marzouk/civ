@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme111" class="d-flex justify-content-center">
        <resume-theme-111  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-111>
    </div>
@endsection