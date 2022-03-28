@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Equipment')

@section('content_header')
    <h1>Equipment
      <a style="float:right; margin-left:2.5em" href="{{ route('userdevices.index', ['view_type'=>'manufacturer']) }}" class="btn btn-primary">View by Manufacturer</a>
      <a style="float:right; margin-left:2.5em" href="{{ route('userdevices.index', ['view_type'=>'category']) }}" class="btn btn-primary">View by Category</a>
      <a style="float:right" href="{{ route('userdevices.index', ['view_type'=>'user']) }}" class="btn btn-primary">View by User</a>
    </h1>
@stop

@section('content')

@if($id == null)
  @if($view_type == 'user')
    <p>Users</p>
    @foreach($deviceusers AS $deviceuser)
      <a href="{{ route('userdevices.index', ['view_type'=>'user', 'id'=>$deviceuser->id]) }}" class="btn btn-primary">{{ deviceuser->first_name." ".deviceuser->last_name }}</a>
    @endforeach
  @elseif($view_type == 'category')
    @foreach($categories AS $category)
      <a href="{{ route('userdevices.index', ['view_type'=>'category', 'id'=>$category->id]) }}" class="btn btn-primary">{{ category->name }}</a>
    @endforeach
  @elseif($view_type == 'manufacturer')
    @foreach($manufacturers AS $manufacturer)
      <a href="{{ route('userdevices.index', ['view_type'=>'manufacturer', 'id'=>$manufacturer->id]) }}" class="btn btn-primary">{{ manufacturer->name }}</a>
    @endforeach
  @endif
@else
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
@endif
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop