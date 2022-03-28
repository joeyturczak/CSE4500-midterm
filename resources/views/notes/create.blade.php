@extends('adminlte::page')

@section('title', 'Notes')

@section('content_header')
  <h1>Notes</h1>
@stop

@section('content')

<form method="post" action="{{ route('notes.store') }}">
  @csrf

  <x-adminlte-select name="userdevice_id" label="Equipment">
    @foreach($userdevices AS $d)
      <option value='{{ $d->id }}'>{{ $d->deviceuser->first_name." ".$d->deviceuser->last_name." ".$d->name." - ID: ".$d->id }}</option>
    @endforeach
  </x-adminlte-select>

  @php ($options = ['Software'. 'Service', 'Other'])

  <x-adminlte-select name="reason" label="Reason">
    @foreach($options AS $o)
      <option value='{{ $o }}'>{{ $o }}</option>
    @endforeach
  </x-adminlte-select>

  <x-adminlte-input name="description" type="textarea" label="Description" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop