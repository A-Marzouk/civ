@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme12" class="d-flex justify-content-center">
        <resume-theme-12  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-12>
    </div>
@endsection