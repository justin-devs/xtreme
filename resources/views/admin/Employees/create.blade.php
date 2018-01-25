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
         <h2>Add New Employee</h2>
            {!! Form::open(['route' => 'employees.store']) !!}
              <div class="form-group">
                {{Form::label('employeeid', 'Employee ID')}}                
                {{Form::text('employeeid','', ['class' => 'form-control', 'placeholder' => '########'])}}
              </div> 
              <div class="form-group">
                {{Form::label('name', 'Employee Name')}}
                {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Employee Name'])}}
              </div> 
              <div class="form-group">
                {{Form::label('surname', 'Employee Surname')}}
                {{Form::text('surname','', ['class' => 'form-control', 'placeholder' => 'Surname'])}}
              </div>
              <div class="form-group">
                {{Form::label('roles', 'Employee Roles')}}
                <select name="roles[]" id="" multiple="multiple" class="form-control select2-multi">
                  @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->rolename}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                {{Form::label('cell', 'Employee Cell')}}
                {{Form::text('cell','', ['class' => 'form-control', 'placeholder' => 'Number'])}}
              </div>
              <div class="form-group">
                {{Form::label('address', 'Employee Address')}}
                {{Form::text('address','', ['class' => 'form-control', 'placeholder' => '123 Foundry Rd'])}}
              </div>
              <div class="form-group">
                {{Form::label('password', 'Password')}}
                {{Form::password('password', ['class' => 'form-control'])}}
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
