@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Manufacturers')

@section('content_header')
  <h1>{{ $manufacturer->name }}</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Contact Info</h3>
      </div>
      <div class="card-body">
        <h4>Sales Contact Information</h4>
        <p>{{ $manufacturer->sales_phone; }}</p>
        <p>{{ $manufacturer->sales_email; }}</p>
        <h4>Tech Support Contact Information</h4>
        <p>{{ $manufacturer->support_phone; }}</p>
        <p>{{ $manufacturer->support_email; }}</p>
      </div>
      <div class="card-footer">
        <a class="btn btn-success btn-block" href="{{ route('manufacturers.edit',['manufacturer'=>$manufacturer->id]) }}">Edit</a>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <h3 class="card-title">Equipment</h3>
      </div>
      <div class="card-body">
        <table id="equipment_table" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Screen Size</th>
                    <th>RAM</th>
                    <th>Storage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manufacturer->devices AS $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->spec_screen_size }}</td>
                    <td>{{ $item->spec_ram }}</td>
                    <td>{{ $item->spec_storage }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@stop

@section('js')
    <script>
    $(document).ready(function() {
      $('#table').DataTable();
    });
    </script>
@stop