@extends('layouts.my-app')
@section('content')

    {{-- if we have admin we add a new navbar for admin --}}

    @if(isset($is_admin) && $is_admin)
        <ul class="admin-panel-bar">
            <li><a class="active" href="/workforce-admin">Admin Panel</a></li>
        </ul>
    @endif

    <div id="adminResumeBuilder">
        <admin-resume-builder @if(isset($tempUser)) :tempuser="{{$tempUser}}" @endif ></admin-resume-builder>
    </div>

@endsection
