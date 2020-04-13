@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme502" >
        <resume-theme-502  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-502>
    </div>
@endsection
