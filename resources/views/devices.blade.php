@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Hardware')

@section('content_header')
    <h1>Hardware</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th style="width: 90px">Specification</th><th style="width: 120px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($hardwares AS $hardware)
        <tr>
          <td>{{ $hardware->id }}</td>
          <td>{{ $hardware->name }}</td>
          <td>
            <div style="text-align: center;">
              <a class="btn btn-default" href="{{ route('hardwares.show', ['hardware'=>$hardware->id]) }}">View</a>
            </div>
          </td>
          <td>
            <div style="display: inline">

              <form style="margin: 0; padding: 0" action="{{ route('hardwares.destroy', ['hardware'=>$hardware->id]) }}" method="POST">
                <a class="btn btn-default" href="{{ route('hardwares.edit', ['hardware'=>$hardware->id]) }}">Edit</a>
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
<a href="{{ route('hardwares.create') }}" class="btn btn-primary">Create</a>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop