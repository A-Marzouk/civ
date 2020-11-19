@extends('layouts.admin')

@section('content')

    <div id="adminDashboard">
        <admin-dashboard @if(isset($users)) :users="{{json_encode($users)}}" @endif></admin-dashboard>
    </div>

@endsection
