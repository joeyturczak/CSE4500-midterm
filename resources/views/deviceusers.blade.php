@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th style="width: 150px">Contact Info</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($deviceusers AS $deviceuser)
        <tr>
          <td>{{ $deviceuser->id }}</td>
          <td>{{ $deviceuser->name }}</td>
          <td>
            <a class="btn btn-default btn-sm" style="text-align: center" href="{{ route('deviceusers.show', ['deviceusers'=>$deviceuser->id]) }}">View</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('deviceusers.create') }}" class="btn btn-primary">Create</a>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop