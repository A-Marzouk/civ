@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme509" >
        <resume-theme-509  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-509>
    </div>
@endsection
