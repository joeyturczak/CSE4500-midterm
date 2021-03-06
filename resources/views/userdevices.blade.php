@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Equipment')

@section('content_header')
    <h1>Equipment</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Device Name</th><th>Manufacturer</th><th>Category</th><th>User</th><th style="width: 90px">Information</th><th style="width: 120px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($userdevices AS $userdevice)
        <tr>
          <td>{{ $userdevice->id }}</td>
          <td>{{ $userdevice->device->name }}</td>
          <td>{{ $userdevice->device->manufacturer->name }}</td>
          <td>{{ $userdevice->device->category->name }}</td>
          <td>{{ $userdevice->deviceuser->first_name." ".$userdevice->deviceuser->last_name }}</td>
          <td>
            <div style="text-align: center;">
              <a class="btn btn-default" href="{{ route('userdevices.show', ['userdevice'=>$userdevice->id]) }}">View</a>
            </div>
          </td>
          <td>
            <div style="display: inline">

              <form style="margin: 0; padding: 0" action="{{ route('userdevices.destroy', ['userdevice'=>$userdevice->id]) }}" method="POST">
                <a class="btn btn-default" href="{{ route('userdevices.edit', ['userdevice'=>$userdevice->id]) }}">Edit</a>
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
@if ($devices->count() <= 0)
<p>At least one hardware device must be created before creating an entry</p>
@elseif ($deviceusers->count() <= 0)
  <p>At least one user must be created before creating an entry</p>
@else
  <a href="{{ route('userdevices.create') }}" class="btn btn-primary">Create</a>
@endif
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop