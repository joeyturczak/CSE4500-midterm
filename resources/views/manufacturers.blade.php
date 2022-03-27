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
          <th style="width: 10px">#</th><th>Name</th><th style="width: 100px">Contact Info</th><th style="width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($manufacturers AS $manufacturer)
        <tr>
          <td>{{ $manufacturer->id }}</td>
          <td>{{ $manufacturer->name }}</td>
          <td>
            <div style="text-align: center;">
              <a class="btn btn-default btn-sm" href="{{ route('manufacturers.show', ['manufacturer'=>$manufacturer->id]) }}">View</a>
            </div>
          </td>
          <td>
            <div style="display: inline">
              <a class="btn btn-default btn-sm" href="{{ route('manufacturers.edit', ['manufacturer'=>$manufacturer->id]) }}">Edit</a>
              
              <a class="btn btn-default btn-sm" href="{!! Form::open(['route' => ['manufacturers.destroy', $manufacturers->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('DELETE') !!}
                {!! Form::close() !!}">Delete</a>
              <!-- <a class="btn btn-default btn-sm" href="{{ route('manufacturers.destroy', ['manufacturer'=>$manufacturer->id]) }}">Delete</a> -->
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