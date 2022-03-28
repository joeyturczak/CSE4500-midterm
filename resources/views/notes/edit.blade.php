@extends('adminlte::page')

@section('title', 'Notes')

@section('content_header')
  <h1>Notes</h1>
@stop

@section('content')
<form method="post" action="{{ route('notes.update', ['note'=>$note->id]) }}">
  @csrf
  @method('PUT')
  
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

  <x-adminlte-select name="userdevice_id" label="Equipment">
    @foreach($userdevices AS $d)
      @if($d->id == $note->userdevice_id)
        <option value='{{ $d->id }}' selected="selected">{{ $d->deviceuser->first_name." ".$d->deviceuser->last_name." -- ".$d->device->name." -- ID: ".$d->id }}</option>
      @else
        <option value='{{ $d->id }}'>{{ $d->deviceuser->first_name." ".$d->deviceuser->last_name." -- ".$d->device->name." -- ID: ".$d->id }}</option>
      @endif
    @endforeach
  </x-adminlte-select>

  $options = ['Software'. 'Service', 'Other'];

  <x-adminlte-select name="reason" label="Reason">
    @foreach($options AS $o)
      @if($o == $note->reason)
        <option value='{{ $o }}' selected="selected">{{ $o }}</option>
      @else
        <option value='{{ $o }}'>{{ $o }}</option>
      @endif
    @endforeach
  </x-adminlte-select>

  <x-adminlte-textarea name="description" value="{{ $note->description }}" type="textarea" label="Description" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop