@extends('admin.layout.auth')

@section('content')
<div class="container-fluid">
  <div class="pull-left">
    <a href="{{route('employees.index')}}" class="btn btn-default"><< Go Back</a>
  </div>
</div>
<div class="container">
    <div class="row text-center">
      <div class="col-sm-6 col-sm-offset-3 lightgrey">
         <h2>Edit Employee</h2>
            {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'PUT']) !!}
              <div class="form-group">
                {{Form::label('employeeid', 'Employee ID')}}                
                {{Form::text('employeeid',$employee->employeeid, ['class' => 'form-control'])}}
              </div> 
              <div class="form-group">
                {{Form::label('name', 'Employee Name')}}
                {{Form::text('name',$employee->name, ['class' => 'form-control', 'placeholder' => 'Employee Name'])}}
              </div> 
              <div class="form-group">
                {{Form::label('surname', 'Employee Surname')}}
                {{Form::text('surname', $employee->surname, ['class' => 'form-control', 'placeholder' => 'Surname'])}}
              </div>
              <div class="form-group">
                {{Form::label('roles', 'Employee Roles')}}
                {{Form::select('roles[]', $roles, $employee->roles->pluck('id')->toArray(), ['class' => 'form-control select2-multi', 'multiple' => 'multiple'])}}
                  
              </div>
              <div class="form-group">
                {{Form::label('cell', 'Employee Cell')}}
                {{Form::text('cell', $employee->cell, ['class' => 'form-control', 'placeholder' => 'Number'])}}
              </div>
              <div class="form-group">
                {{Form::label('address', 'Employee Address')}}
                {{Form::text('address', $employee->address, ['class' => 'form-control', 'placeholder' => '123 Foundry Rd'])}}
              </div>
              
              {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}     
                
            {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $('.select2-multi').select2();
</script>
@endsection
