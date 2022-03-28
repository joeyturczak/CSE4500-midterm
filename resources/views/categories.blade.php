@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th style="width: 120px">Action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($categories AS $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <div style="display: inline">
              <form style="margin: 0; padding: 0" action="{{ route('categories.destroy', ['category'=>$category->id]) }}" method="POST">
                <a class="btn btn-default" href="{{ route('categories.edit', ['category'=>$category->id]) }}">Edit</a>
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
<a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop