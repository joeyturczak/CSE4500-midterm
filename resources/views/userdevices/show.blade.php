@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
  <h1>Equipment</h1>
@stop

@section('content')
  <h4>Hardware Specification</h4>
  <p>Manufacturer: {{ $userdevice->device->manufacturer->name }}</p>
  <p>Category: {{ $userdevice->device->category->name }}</p>
  <p>Device Name: {{ $userdevice->device->name }}</p>
  <p>Screen Size: {{ $userdevice->device->spec_screen_size; }}</p>
  <p>RAM: {{ $userdevice->device->spec_ram; }}</p>
  <p>Storage: {{ $userdevice->device->spec_storage; }}</p>

  <h4>Purchase Information</h4>
  <p>Invoice #: {{ $userdevice->invoice_number }}</p>
  <p>Price: ${{ $userdevice->price }}</p>
  <p>Purchase Date: {{ $userdevice->purchase_date }}</p>

  <h4>User information</h4>
  <p>Name: {{ $userdevice->deviceuser->first_name." ".$userdevice->deviceuser->last_name; }}</p>
  <p>Phone Number: {{ $userdevice->deviceuser->phone; }}</p>
  <p>Email: {{ $userdevice->deviceuser->email; }}</p>
@stop