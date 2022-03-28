@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
  <h1>Categories</h1>
@stop

@section('content')
<form method="post" action="{{ route('categories.store') }}">
  @csrf
  <x-adminlte-input name="name" label="Name" />
  <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop