@extends('layouts.admin')

@section('content')

    <div id="adminDashboard">
        <admin-dashboard @if(isset($users)) :users="{{$users}}" @endif></admin-dashboard>
    </div>

@endsection
