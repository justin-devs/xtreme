@extends('admin.layout.auth')

@section('content')
<div class="container well">
  <div class="row">
    <div class="col-xs-3">
      <a href="{{route('vehicles.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add New Vehicle</a>
    </div>
    <div class="col-xs-3 col-xs-offset-6">
      <form action="{{route('vehicles.index')}}" method="get" class="form-inline">
        <div class="form-group">
          <input type="text" name="s" class="form-control" placeholder="keyword" value="{{ isset($s) ? $s : '' }}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        @if(count($vehicles) > 0)
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Make</th>
                  <th scope="col">Model</th>
                  <th scope="col">Color</th>
                  <th scope="col">Registration</th>
                  <th scope="col">Owner</th>
                  <th scope="col">Date Added</th>
                  <th scope="col" class="text-center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</th>
                  <th scope="col" class="text-center"><i class="fa fa-trash" aria-hidden="true"></i> Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($vehicles as $vehicle)
                <tr>
                  <th scope="row">{{$vehicle->id}}</th>
                  <td class="capitalize">{{ $vehicle->make }}</td>
                  <td>{{ $vehicle->model }}</td>
                  <td class="capitalize">{{ $vehicle->color }}</td>
                  <td class="uppercase">{{ $vehicle->registration }}</td>
                  <td class="capitalize">
                    @if(count($vehicle->customer))
                      <a href="/admin/customers/{{$vehicle->customer->id}}">{{$vehicle->customer->surname}}</a>
                    @else
                      -
                    @endif
                  </td>
                  <td>{{ $vehicle->created_at }}</td>
                  <td class="text-center"><a href="/admin/vehicles/{{$vehicle->id}}/edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                  <td class="text-center">
                    {!! Form::model($vehicle, array('route' => array('vehicles.destroy', $vehicle->id), 'method' => 'DELETE')) !!} 
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $vehicles->links()}}
        @else
            <div class="alert alert-danger">
                No Vehicles in database 
            </div>
        @endif
            
    </div>
</div>
@endsection
