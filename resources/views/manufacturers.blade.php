@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Manufacturers')

@section('content_header')
    <h1>Manufacturers</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th style="width: 90px">Contact Info</th><th style="width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($manufacturers AS $manufacturer)
        <tr>
          <td>{{ $manufacturer->id }}</td>
          <td>{{ $manufacturer->name }}</td>
          <td>
            <div style="text-align: center;">
              <a class="btn btn-default" href="{{ route('manufacturers.show', ['manufacturer'=>$manufacturer->id]) }}">View</a>
            </div>
          </td>
          <td>
            <div style="display: inline">
              
              
              <form style="margin: 0; padding: 0" action="{{ route('manufacturers.destroy', ['manufacturer'=>$manufacturer->id]) }}" method="POST">
                <a class="btn btn-default" href="{{ route('manufacturers.edit', ['manufacturer'=>$manufacturer->id]) }}">Edit</a>
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
<a href="{{ route('manufacturers.create') }}" class="btn btn-primary">Create</a>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop