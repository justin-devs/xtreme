@extends('admin.layout.auth')

@section('content')
<div class="container-fluid">
  <div class="pull-left">
    <a href="{{route('customers.index')}}" class="btn btn-default"><< Go Back</a>
  </div>
</div>
<div class="container">
    <div class="row">
      <h3>{{$customer->name}}'s Vehicles</h3>
      @if(count($vehicles) > 0)
        @foreach($vehicles as $vehicle)
          <div class="panel panel-default">
            <div class="panel-heading capitalize">{{$vehicle->make}} {{$vehicle->model}} {{$vehicle->year}}</div>
            <div class="panel-body">
              <p>Registration: <strong class="uppercase">{{$vehicle->registration}}</strong></p>
              <p>Color: <strong class="uppercase">{{$vehicle->color}}</strong></p>
              <a href="/admin/vehicles/{{$vehicle->id}}/edit" class="btn btn-success pull-left">Edit Vehicle</a>
              {!! Form::model($vehicle, array('route' => array('vehicles.destroy', $vehicle->id), 'method' => 'DELETE')) !!} 
                <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash" aria-hidden="true"></i> Delete Vehicle</button>                 
              {!! Form::close() !!}
            </div>
          </div>
        @endforeach
      @else
        <div class="well">
        <p>Customer has no vehicles</p>
        <a href="/admin/vehicles/create"> Add Vehicle</a>
        </div> 

      @endif 
    </div>
</div>
@endsection
