@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme507" >
        <resume-theme-507  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-507>
    </div>
@endsection
