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
         <h2>Edit Customer</h2>
            {!! Form::model($customer,array('route' => array('customers.update', $customer->id), 'method' => 'PUT')) !!}
              <div class="form-group">
                {{Form::label('title', 'Customer title')}}
                {{Form::select('title', ['mr' => 'Mr.', 'miss' => 'Miss', 'mrs' => 'Mrs.', 'ms' => 'Ms.'],$customer->title,['class'=> 'form-control'])}}
              </div> 
              <div class="form-group">
                {{Form::label('name', 'Customer Name')}}
                {{Form::text('name', $customer->name, ['class' => 'form-control'])}}
              </div> 
              <div class="form-group">
                {{Form::label('surname', 'Customer Surame')}}
                {{Form::text('surname', $customer->surname, ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                {{Form::label('email', 'Customer E-mail')}}
                {{Form::email('email', $customer->email, ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                {{Form::label('cell', 'Customer Cell')}}
                {{Form::text('cell', $customer->cell, ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                {{Form::label('insurancename', 'Insurance Name')}}
                {{Form::text('insurancename', $customer->insurancename, ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                {{Form::label('insurancenumber', 'Insurance Number')}}
                {{Form::text('insurancenumber', $customer->insurancenumber, ['class' => 'form-control'])}}
              </div>
              {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}     
            {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection
