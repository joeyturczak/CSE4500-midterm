@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')
  <h2>{{ $hardware->name; }}</h2>
  <hr>
  <div>
    <h4>Specification</h4>
    <p>{{ $hardware->spec_screen_size; }}</p>
    <p>{{ $hardware->spec_ram; }}</p>
    <p>{{ $hardware->spec_storage; }}</p>
  </div>
@stop