@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')

$options = array();
@foreach($manufacturers AS $m)
  $options[$m->id] = $m->name;
@endforeach

<form method="post" action="{{ route('devices.store') }}">
  @csrf
  <x-adminlte-select name="manufacturer_id" label="Manufacturer">
    <x-adminlte-options :options="{{ $options }}" />
  </x-adminlte-select>
  <x-adminlte-input name="name" label="Name" />
  <x-adminlte-input name="spec_screen_size" label="Screen Size" />
  <x-adminlte-input name="spec_ram" label="RAM" />
  <x-adminlte-input name="spec_storage" label="Storage" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop