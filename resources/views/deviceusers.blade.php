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
          <th style="width: 10px">#</th><th>First Name</th><th>Last Name</th><th style="width: 90px">Contact Info</th><th style="width: 120px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($deviceusers AS $deviceuser)
        <tr>
          <td>{{ $deviceuser->id }}</td>
          <td>{{ $deviceuser->first_name }}</td>
          <td>{{ $deviceuser->last_name }}</td>
          <td>
            <div style="text-align: center;">
              <a class="btn btn-default" href="{{ route('deviceusers.show', ['deviceuser'=>$deviceuser->id]) }}">View</a>
            </div>
          </td>
          <td>
            <div style="display: inline">   
                   
              <form style="margin: 0; padding: 0" action="{{ route('deviceusers.destroy', ['deviceuser'=>$deviceuser->id]) }}" method="POST">
                <a class="btn btn-default" href="{{ route('deviceusers.edit', ['deviceuser'=>$deviceuser->id]) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
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