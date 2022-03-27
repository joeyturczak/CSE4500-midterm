@extends('adminlte::page')

@section('title', 'Manufacturers')

@section('content_header')
  <h1>Manufacturers</h1>
@stop

@section('content')
  <h2>{{ $manufacturer->name; }}</h2>
  <div>
    <p>{{ $manufacturer->sales_phone; }}</p>
    <p>{{ $manufacturer->sales_email; }}</p>
    <p>{{ $manufacturer->support_phone; }}</p>
    <p>{{ $manufacturer->support_email; }}</p>
  </div>
@stop