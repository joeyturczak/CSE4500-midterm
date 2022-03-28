@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')
  <h2>{{ $device->name; }}</h2>
  <hr>
  <div>
    <h4>Manufacturer</h4>
    <p>{{ $device->manufacturer->name }}</p>
    <h4>Category</h4>
    <p>{{ $device->category->name }}</p>
    <h4>Specification</h4>
    <p>Screen size: {{ $device->spec_screen_size; }}</p>
    <p>RAM: {{ $device->spec_ram; }}</p>
    <p>Storage: {{ $device->spec_storage; }}</p>
  </div>
@stop