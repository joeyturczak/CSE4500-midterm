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
                    <th>Invoice#</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manufacturer->devices->userdevice AS $item)
                <tr>
                    <td>{{ $item->device->manufacturer->name }}</td>
                    <td>{{ $item->device->category->name }}</td>
                    <td>{{ $item->device->spec_screen_size }}</td>
                    <td>{{ $item->device->spec_ram }}</td>
                    <td>{{ $item->device->spec_storage }}</td>
                    <td>{{ $item->invoice_number }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->purchase_date }}</td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="{{ route('userdevices.show',['userdevice'=>$item->id]) }}">View</a>
                      <form action="{{ route('userdevices.destroy',['userdevice'=>$item->id]) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                      </form>
                    </td>
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