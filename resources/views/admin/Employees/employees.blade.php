@extends('admin.layout.auth')

@section('content')
<div class="container well">
  <div class="row">
    <div class="col-xs-3">
      <a href="{{route('employees.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add New Employee</a>
    </div>
    <div class="col-xs-3 col-xs-offset-6">
      <form action="{{route('employees.index')}}" method="get" class="form-inline">
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
        @if(count($employees) > 0)
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Contact details</th>
                  <th scope="col">Reset Password</th>
                  <th scope="col" class="text-center">Roles</th>
                  <th scope="col" class="text-center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Employee</th>
                  <th scope="col" class="text-center"><i class="fa fa-trash" aria-hidden="true"></i> Delete Employee</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employees as $employee)
                <tr>
                  <th scope="row">{{$employee->id}}</th>
                  <td>{{ $employee->employeeid }}</td>
                  <td class="capitalize">{{ $employee->name }}</td>
                  <td  class="capitalize">{{ $employee->surname }}</td>
                  <td class="text-center"><a data-toggle="modal" href="#{{$employee->id}}info"><i class="fa fa-list" aria-hidden="true"></a></i></td>
                  <td class="text-center"><a data-toggle="modal" href="#{{$employee->id}}password">Reset</i></td>
                  <td class="text-center"> 
                    @foreach($employee->roles as $role)
                        <span class="label label-default">{{$role->rolename}}</span>
                    @endforeach</td>
                  <td class="text-center"><a href="/admin/employees/{{$employee->id}}/edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                  <td class="text-center">
                    {!! Form::model($employee, array('route' => array('employees.destroy', $employee->id), 'method' => 'DELETE')) !!} 
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    {!! Form::close() !!}
                  </td>
                </tr>


                <!--MODAL INFO-->
                <div id="{{$employee->id}}info" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Employee Contact Information</h4>
                          </div>
                          <div class="modal-body">
                            <p>Employee: <strong class="pull-right"> {{$employee->name}} {{$employee->surname}}</strong></p>
                            <p>Cellphone: <strong class="pull-right"> {{$employee->cell}}</strong></p>
                            <p>Address: <strong class="pull-right"> {{$employee->address}}</strong></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                </div>

                <!--MODAL PASSWORD-->
                <div id="{{$employee->id}}password" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Employee Contact Information</h4>
                          </div>
                          <div class="modal-body">
                            <p>Employee: <strong class="pull-right"> {{$employee->name}} {{$employee->surname}}</strong></p>
                            <p>Cellphone: <strong class="pull-right"> {{$employee->cell}}</strong></p>
                            <p>Address: <strong class="pull-right"> {{$employee->address}}</strong></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                </div>

                <!--MODAL ROLES-->
                <div id="{{$employee->id}}roles" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Employee has the following roles</h4>
                          </div>
                          <div class="modal-body">
                            @foreach($employee->roles as $role)
                                <span class="label label-default">{{$role->rolename}}</span>
                            @endforeach
                          </div>
                          <div class="modal-footer">
                             <button type="button" class="btn btn-default pull-left">Add role</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                </div>

                
              
                @endforeach
              </tbody>
            </table>
            {{ $employees->appends(['s'=> $s])->links()}}
            

            
                


        @else
            <div class="alert alert-danger">
                No Employees in database 
            </div>
        @endif
            
    </div>
</div>
</div>
@endsection
