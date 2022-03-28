@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')
<form method="post" action="{{ route('devices.update', ['device'=>$device->id]) }}">
  @csrf
  @method('PUT')
  <x-adminlte-input name="name" value="{{ $device->name }}" label="Name" />
  <x-adminlte-input name="spec_screen_size" value="{{ $device->spec_screen_size }}" label="Screen Size" />
  <x-adminlte-input name="spec_ram" value="{{ $device->spec_ram }}" label="RAM" />
  <x-adminlte-input name="spec_storage" value="{{ $device->spec_storage }}" label="Storage" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop