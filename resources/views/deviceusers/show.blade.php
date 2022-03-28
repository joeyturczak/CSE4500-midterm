@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
  <h1>Users</h1>
@stop

@section('content')
  <h2>{{ $deviceuser->first_name." ".$deviceuser->last_name; }}</h2>
  <hr>
  <div>
    <h4>Contact Information</h4>
    <p>{{ $deviceuser->phone; }}</p>
    <p>{{ $deviceuser->email; }}</p>
  </div>
@stop