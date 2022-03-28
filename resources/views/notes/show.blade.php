@extends('adminlte::page')

@section('title', 'Notes')

@section('content_header')
  <h1>Notes</h1>
@stop

@section('content')
  <h4>Device Information</h4>
  <p>Assigned to: {{ $note->userdevice->deviceuser->first_name." ".$note->userdevice->deviceuser->last_name }}</p>
  <p>Manufacturer: {{ $note->userdevice->device->manufacturer->name }}</p>
  <p>Category: {{ $note->userdevice->device->category->name }}</p>
  <p>Device Name: {{ $note->userdevice->device->name }}</p>

  <h4>Note</h4>
  <p>Last updated: {{ $note->updated_at }}</p>
  <p>Reason: ${{ $note->reason }}</p>
  <p>Description: {{ $note->description }}</p>
@stop