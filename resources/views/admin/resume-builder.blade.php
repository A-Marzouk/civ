@extends('layouts.my-app')
@section('content')


    <div id="adminResumeBuilder">
        <admin-resume-builder @if(isset($tempUser)) :tempuser="{{$tempUser}}" @endif ></admin-resume-builder>
    </div>

@endsection
