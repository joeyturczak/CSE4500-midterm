@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
  <h1>Equipment</h1>
@stop

@section('content')
<form method="post" action="{{ route('userdevices.update', ['userdevice'=>$userdevice->id]) }}">
  @csrf
  @method('PUT')

  <x-adminlte-select name="device_id" label="Hardware Device">
    @foreach($devices AS $d)
      @if($u->id == $userdevice->device_id)
        <option value='{{ $d->id }}' selected="selected">{{ $d->name }}</option>
      @else
        <option value='{{ $d->id }}'>{{ $d->name }}</option>
      @end
    @endforeach
  </x-adminlte-select>
  
  <x-adminlte-select name="deviceuser_id" value="{{ $userdevice->deviceuser_id }}" label="User">
    @foreach($deviceusers AS $u)
      @if($u->id == $userdevice->deviceuser_id)
        <option value='{{ $u->id }}' selected="selected">{{ $u->first_name." ".$u->last_name }}</option>
      @else
        <option value='{{ $u->id }}'>{{ $u->first_name." ".$u->last_name }}</option>
      @endif
    @endforeach
  </x-adminlte-select>

  <x-adminlte-input name="invoice_number" value="{{ $userdevice->invoice_number }}" label="Invoice #" />
  <x-adminlte-input name="price" type="number" step="0.01" value="{{ $userdevice->price }}" label="Price" />
  <x-adminlte-input name="purchase_date" type="date" value="{{ $userdevice->purchase_date }}" label="Purchase Date" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop