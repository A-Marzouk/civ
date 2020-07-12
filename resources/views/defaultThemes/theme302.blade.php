@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme302" class="d-flex justify-content-center">
        <resume-theme-302 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}" ></resume-theme-302>
    </div>
@endsection
