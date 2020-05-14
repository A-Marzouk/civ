@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme508" >
        <resume-theme-508  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-508>
    </div>
@endsection
