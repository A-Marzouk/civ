@extends('layouts.theme-vuetify')

@section('content')
<div id="resumeTheme205" class="d-flex justify-content-center">
    <resume-theme-205 @if(isset($user)) :user="{{$user}}" @endif :is_preview="{{$is_preview}}"></resume-theme-205>
</div>
@endsection