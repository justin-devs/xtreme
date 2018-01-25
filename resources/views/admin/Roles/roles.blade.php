@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-xs-8">
        @if(count($roles) > 0)
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Role</th>
                  <th scope="col" class="text-center">Edit</th>
                  <th scope="col" class="text-center">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($roles as $role)
                <tr>
                  <th scope="row">{{$role->id}}</th>
                  <td class="capitalize">{{ $role->rolename }}</td>
                  <td class="text-center"><a href="/admin/roles/{{$role->id}}/edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                  <td class="text-center">
                    {!! Form::model($role, array('route' => array('roles.destroy', $role->id), 'method' => 'DELETE')) !!} 
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $roles->links()}}
        @else
            <div class="alert alert-danger">
                No Roles in database 
            </div>
        @endif
      </div>
      <div class="col-xs-4">
        <div class="panel panel-default">
        <div class="panel-heading">Add New Role</div>
        <div class="panel-body">
          <div class="form-group">
            {{Form::open(['route'=> 'roles.store'])}}
              {{Form::label('rolename', 'Rolename:')}}
              {{Form::text('rolename', '',['placeholder' => 'Mechanic', 'class' => 'form-control'])}}
<br>
              {{Form::submit('Add Role', [ 'class' => 'form-control btn btn-primary'])}}
            {{Form::close()}}
          </div>
        </div>
      </div>
      </div> 
    </div>
</div>
@endsection
