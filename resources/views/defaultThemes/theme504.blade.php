@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme504" >
        <resume-theme-504  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-504>
    </div>
@endsection
