@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme109" class="d-flex justify-content-center">
        <resume-theme-109  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-109>
    </div>
@endsection