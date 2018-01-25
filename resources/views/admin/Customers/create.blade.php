@extends('admin.layout.auth')

@section('content')
<div class="container-fluid">
  <div class="pull-left">
    <a href="{{route('customers.index')}}" class="btn btn-default"><< Go Back</a>
  </div>
</div>
<div class="container">
    <div class="row text-center">
      <div class="col-sm-6 col-sm-offset-3 lightgrey">
         <h2>Add New Customer</h2>
            {!! Form::open(['route' => 'customers.store']) !!}
              <div class="form-group">
                {{Form::label('title', 'Customer title')}}
                {{Form::select('title', ['mr' => 'Mr.', 'miss' => 'Miss', 'mrs' => 'Mrs.', 'ms' => 'Ms.'],null,['class'=> 'form-control'])}}
              </div> 
              <div class="form-group">
                {{Form::label('name', 'Customer Name')}}
                {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Name'])}}
              </div> 
              <div class="form-group">
                {{Form::label('surname', 'Customer Surame')}}
                {{Form::text('surname','', ['class' => 'form-control', 'placeholder' => 'Surname'])}}
              </div>
              <div class="form-group">
                {{Form::label('email', 'Customer E-mail')}}
                {{Form::email('email','', ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
              </div>
              <div class="form-group">
                {{Form::label('cell', 'Customer Cell')}}
                {{Form::text('cell','', ['class' => 'form-control', 'placeholder' => 'Number'])}}
              </div>
              <div class="form-group">
                {{Form::label('insurancename', 'Insurance Name')}}
                {{Form::text('insurancename','', ['class' => 'form-control', 'placeholder' => 'Insurance Name'])}}
              </div>
              <div class="form-group">
                {{Form::label('insurancenumber', 'Insurance Number')}}
                {{Form::text('insurancenumber','', ['class' => 'form-control', 'placeholder' => 'Insurance Number'])}}
              </div>
              {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}     
            {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection
