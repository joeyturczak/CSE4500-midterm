@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
  <h1>Users</h1>
@stop

@section('content')
<form method="post" action="{{ route('deviceusers.store') }}">
  @csrf
  <x-adminlte-input name="first_name" label="First Name" />
  <x-adminlte-input name="last_name" label="Last Name" />
  <x-adminlte-input name="phone" label="Phone Number" />
  <x-adminlte-input name="email" label="Email Address" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop