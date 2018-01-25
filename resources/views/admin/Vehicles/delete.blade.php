@extends('admin.layout.auth')

@section('content')
<div class="container-fluid">
  <div class="pull-left">
    <a href="{{route('vehicles.index')}}" class="btn btn-default"><< Go Back</a>
  </div>
</div>
<div class="container">
    <div class="row text-center">
      <div class="col-sm-6 col-sm-offset-3 lightgrey">
         <h2>Delete Vehicle</h2>
         {!! Form::model($vehicle, array('route' => array('vehicles.destroy', $vehicle->id), 'method' => 'DELETE')) !!} 
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}     
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
