@extends('layouts.theme-vuetify')

@section('content')
    <div id="resumeTheme113" class="d-flex justify-content-center">
        <resume-theme-113  @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-113>
    </div>
@endsection