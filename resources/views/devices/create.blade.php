@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')

<form method="post" action="{{ route('devices.store') }}">
  @csrf
  <x-adminlte-input name="name" label="Name" />

  <x-adminlte-select name="manufacturer_id" label="Manufacturer">
    @foreach($manufacturers AS $m)
      <option value='{{ $m->id }}'>{{ $m->name }}</option>
    @endforeach
  </x-adminlte-select>
  
  <x-adminlte-select name="category_id" label="Category">
    @foreach($categories AS $c)
      <option value='{{ $c->id }}'>{{ $c->name }}</option>
    @endforeach
  </x-adminlte-select>

  <x-adminlte-input name="spec_screen_size" label="Screen Size" />
  <x-adminlte-input name="spec_ram" label="RAM" />
  <x-adminlte-input name="spec_storage" label="Storage" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop