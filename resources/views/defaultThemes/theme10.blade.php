@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme10" class="d-flex justify-content-center">
        <resume-theme-10 page="resume" :user="{{auth()->user()->toJson()}}"></resume-theme-10>
    </div>
@endsection
