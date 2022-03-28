@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')
  <h2>{{ $device->name; }}</h2>
  <hr>
  <div>
    <h4>Specification</h4>
    <p>{{ $device->spec_screen_size; }}</p>
    <p>{{ $device->spec_ram; }}</p>
    <p>{{ $device->spec_storage; }}</p>
  </div>
@stop