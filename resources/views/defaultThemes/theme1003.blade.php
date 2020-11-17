@extends('layouts.my-app')

@section('content')
<div id="resumeTheme1003" class="d-flex justify-content-center">
    <resume-theme-1003 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}" page="resume"></resume-theme-1003>
</div>
@endsection
