@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme506" >
        <resume-theme-506  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-506>
    </div>
@endsection
