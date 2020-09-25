@extends('layouts.admin')

@section('content')

    <div id="adminDashboard">
        <admin-dashboard @if(isset($users)) :users="{{$users}}" @endif @if( isset($deletedUsers) ) :deleted_users="{{$deletedUsers}}" @endif></admin-dashboard>
    </div>

@endsection
