@extends('layouts.my-app')
@section('content')

    <div id="external_reference">
        <external-reference :user="{{json_encode($user)}}"></external-reference>
    </div>

@endsection
