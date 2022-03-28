@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
  <h1>Hardware</h1>
@stop

@section('content')
<form method="post" action="{{ route('hardwares.update', ['hardware'=>$hardware->id]) }}">
  @csrf
  @method('PUT')
  <x-adminlte-input name="name" value="{{ $hardware->name }}" label="Name" />
  <x-adminlte-input name="spec_screen_size" value="{{ $hardware->sales_phone }}" label="Screen Size" />
  <x-adminlte-input name="spec_ram" value="{{ $hardware->sales_email }}" label="RAM" />
  <x-adminlte-input name="spec_storage" value="{{ $hardware->support_phone }}" label="Storage" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop