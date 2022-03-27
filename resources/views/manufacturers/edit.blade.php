@extends('adminlte::page')

@section('title', 'Manufacturers')

@section('content_header')
  <h1>Manufacturers</h1>
@stop

@section('content')
<form method="put" action="{{ route('manufacturers.update', ['manufacturer'=>$manufacturer->id]) }}">
  @csrf
  <x-adminlte-input name="name" placeholder="{{ $manufacturer->name }}" label="Name" />
  <x-adminlte-input name="sales_phone" placeholder="{{ $manufacturer->sales_phone }}" label="Sales Phone Number" />
  <x-adminlte-input name="sales_email" placeholder="{{ $manufacturer->sales_email }}" label="Sales Email Address" />
  <x-adminlte-input name="support_phone" placeholder="{{ $manufacturer->support_phone }}" label="Tech Support Phone Number" />
  <x-adminlte-input name="support_email" placeholder="{{ $manufacturer->support_email }}"  label="Tech Support Email Address" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop