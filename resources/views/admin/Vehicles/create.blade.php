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
         <h2>Add New Vehicle</h2>
        {!! Form::open(['route' => 'vehicles.store']) !!}
          <div class="form-group">
            {{Form::label('year', 'Year')}}
            <select class="form-control" name="year" id="year"></select>  
          </div> 
          <div class="form-group">
            {{Form::label('make', 'Make')}}
            <select class="form-control" name="make" id="make"></select> 
          </div>
          <div class="form-group">
            {{Form::label('model', 'Model')}}
            <select class="form-control" name="model" id="model"></select>
          </div>
          <div class="form-group">
            {{Form::label('customer_id', 'Customer')}}
           {!! Form::select('customer_id', $customers, null,['class' => 'form-control', 'placeholder' => 'No customer'] ) !!}
          </div>
          <div class="form-group">
            {{Form::label('color', 'Vehicle Color')}}
            {{Form::select('color', ['white' => 'White', 'black' => 'Black', 'grey' => 'Grey', 'yellow' => 'Yellow', 'red' => 'Red', 'blue' => 'Blue', 'green' => 'Green', 'brown' => 'Brown', 'pink' => 'Pink', 'orange' => 'Orange', 'purple' => 'Purple'], null, ['class' => 'form-control', 'placeholder' => 'Pick a color...'])}}
          </div>
          <div class="form-group">
            {{Form::label('registration', 'Registration Number')}}
            {{Form::text('registration','', ['class' => 'form-control', 'placeholder' => 'Registration'])}}
          </div>
          {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}     
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>
<script type="text/javascript">
$(document).ready(
function()
{
     //Create a variable for the CarQuery object.  You can call it whatever you like.
     var carquery = new CarQuery();

     //Run the carquery init function to get things started:
     carquery.init();
     
     //Optionally, you can pre-select a vehicle by passing year / make / model / trim to the init function:
     //carquery.init('2000', 'dodge', 'Viper', 11636);

     //Optional: initialize the year, make, model, and trim drop downs by providing their element IDs
     carquery.initYearMakeModelTrim('year', 'make', 'model', '');
});
</script>
@endsection