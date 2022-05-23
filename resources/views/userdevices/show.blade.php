@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Equipment')

@section('content_header')
  <h1>Equipment</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Hardware Specification</h3>
      </div>
      <div class="card-body">
        <p>Manufacturer: {{ $userdevice->device->manufacturer->name }}</p>
        <p>Category: {{ $userdevice->device->category->name }}</p>
        <p>Device Name: {{ $userdevice->device->name }}</p>
        <p>Screen Size: {{ $userdevice->device->spec_screen_size; }}</p>
        <p>RAM: {{ $userdevice->device->spec_ram; }}</p>
        <p>Storage: {{ $userdevice->device->spec_storage; }}</p>

        <h4>Purchase Information</h4>
        <p>Invoice #: {{ $userdevice->invoice_number }}</p>
        <p>Price: ${{ $userdevice->price }}</p>
        <p>Purchase Date: {{ $userdevice->purchase_date }}</p>

        <h4>User information</h4>
        <p>Name: {{ $userdevice->deviceuser->first_name." ".$userdevice->deviceuser->last_name; }}</p>
        <p>Phone Number: {{ $userdevice->deviceuser->phone; }}</p>
        <p>Email: {{ $userdevice->deviceuser->email; }}</p>
      </div>
      <div class="card-footer">
        <a class="btn btn-success btn-block" href="{{ route('userdevices.edit',['userdevice'=>$userdevice->id]) }}">Edit</a>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <h3 class="card-title">Notes</h3>
      </div>
      <div class="card-body">
        <table id="table" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($userdevice->notes AS $item)
                <tr>
                  <td>{{ $item->reason }}</td>
                  <td>{{ $item->description }}</td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{ route('notes.show',['note'=>$item->id]) }}">View</a>
                    <form action="{{ route('notes.destroy',['note'=>$item->id]) }}" method="POST" >
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