@extends('admin.layout.auth')

@section('content')
<div class="container-fluid">
  <div class="pull-left">
    <a href="{{route('jobs.index')}}" class="btn btn-default"><< Go Back</a>
  </div>
</div>
<div class="container">
    <div class="row text-center">
      <div class="col-sm-6 col-sm-offset-3 lightgrey">
         <h2>Add New Job</h2>
        {!! Form::open(['route' => 'jobs.store']) !!}
          
          <div class="form-group">
            {{Form::label('jobdescription', 'Description')}}
            {{Form::text('jobdescription','', ['class' => 'form-control', 'placeholder' => '###'])}}
          </div>
          <div class="form-group">
            {{Form::label('employeeid', 'Assign employee')}}
            {{Form::select('employeeid',$employees, null,['class' => 'form-control', 'placeholder' => '###'])}}
           
          </div>
          <div class="form-group">
            {{Form::label('vehicleid', 'Vehicle')}}
            {{Form::select('vehicleid', $vehicles, null, ['class' => 'form-control', 'placeholder' => '###'])}}
          </div>
          {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}     
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
