@extends('adminlte::page')

@section('title', 'Manufacturers')

@section('content_header')
  <h1>Manufacturers</h1>
@stop

@section('content')
  <h2>{{ $manufacturer->name; }}</h2>
  <div>
    <h3>Sales Contact Information</h3>
    <p>{{ $manufacturer->sales_phone; }}</p>
    <p>{{ $manufacturer->sales_email; }}</p>
    <h3>Tech Support Contact Information</h3>
    <p>{{ $manufacturer->support_phone; }}</p>
    <p>{{ $manufacturer->support_email; }}</p>
  </div>
@stop