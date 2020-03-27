@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme8" class="d-flex justify-content-center w-100">
        <resume-theme-8 @if(isset($user)) :user="{{$user}}" @endif></resume-theme-8>
    </div>
@endsection
