@extends('adminlte::page')

@section('title', 'Select User')

@section('content_header')
    <h1>Select User</h1>
@stop

@section('content')
        
@foreach($deviceusers AS $deviceuser)
<a href="{{ route('userdevices.index', ['view_type'=>'user', 'id'=>$deviceuser->id]) }}" class="btn btn-primary">{{ deviceuser->first_name." ".deviceuser->last_name}}</a>
@endforeach

@stop
