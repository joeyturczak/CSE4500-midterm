@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Notes')

@section('content_header')
    <h1>Notes</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Last Updated</th><th>Manufacturer</th><th>Device Name</th><th>User</th><th>Note Type</th><th style="width: 90px">Information</th><th style="width: 120px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($notes AS $note)
        <tr>
          <td>{{ $note->id }}</td>
          <td>{{ $note->updated_at }}</td>
          <td>{{ $note->userdevice->device->manufacturer->name }}</td>
          <td>{{ $note->userdevice->device->name }}</td>
          <td>{{ $note->userdevice->deviceuser->first_name." ".$note->userdevice->deviceuser->last_name }}</td>
          <td>{{ $note->type }}</td>
          <td>
            <div style="text-align: center;">
              <a class="btn btn-default" href="{{ route('notes.show', ['note'=>$note->id]) }}">View</a>
            </div>
          </td>
          <td>
            <div style="display: inline">

              <form style="margin: 0; padding: 0" action="{{ route('notes.destroy', ['note'=>$note->id]) }}" method="POST">
                <a class="btn btn-default" href="{{ route('notes.edit', ['note'=>$note->id]) }}">Edit</a>
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
@if ($userdevices->count() <= 0)
  <p>There is no equipment to make notes on yet</p>
@else
  <a href="{{ route('notes.create') }}" class="btn btn-primary">Create</a>
@endif
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop