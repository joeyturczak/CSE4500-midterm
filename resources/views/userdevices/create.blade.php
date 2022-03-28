@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
  <h1>Equipment</h1>
@stop

@section('content')

<form method="post" action="{{ route('userdevices.store') }}">
  @csrf

  <x-adminlte-select name="device_id" label="Hardware Device">
    @foreach($devices AS $d)
      <option value='{{ $d->id }}'>{{ $d->name }}</option>
    @endforeach
  </x-adminlte-select>
  
  <x-adminlte-select name="deviceuser_id" label="User">
    @foreach($deviceusers AS $u)
      <option value='{{ $u->id }}'>{{ $u->first_name." ".$u->last_name }}</option>
    @endforeach
  </x-adminlte-select>

  <x-adminlte-input name="invoice_number" label="Invoice #" />
  <x-adminlte-input name="price" type="number" label="Price" />
  <x-adminlte-input name="purchase_date" type="date" label="Purchase Date" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop