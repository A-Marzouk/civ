@extends('layouts.my-app')

@section('content')
    <div id="resumeTheme200" class="d-flex justify-content-center">
        <resume-theme-200  @if(isset($user)) :user="{{$user}}" ></resume-theme-200>
    </div>
@endsection
