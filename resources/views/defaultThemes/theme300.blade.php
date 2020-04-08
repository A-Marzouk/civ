@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme300" class="d-flex justify-content-center">
        <resume-theme-300  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-300>
    </div>
@endsection
