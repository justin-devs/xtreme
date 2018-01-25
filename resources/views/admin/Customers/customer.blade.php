@extends('admin.layout.auth')

@section('content')
<div class="container well">
  <div class="row">
    <div class="col-xs-3">
      <a href="{{route('customers.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add New Customer</a>
    </div>
    <div class="col-xs-3 col-xs-offset-6">
      <form action="{{route('customers.index')}}" method="get" class="form-inline">
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
        @if(count($customers) > 0)
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Cell</th>
                  <th scope="col" class="text-center">View insurance details</th>
                  <th scope="col" class="text-center">View vehicles</th>
                  <th scope="col" class="text-center"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit customer</th>
                  <th scope="col" class="text-center"><i class="fa fa-trash" aria-hidden="true"></i> Delete customer</th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $customer)
                <tr>
                  <th scope="row">{{$customer->id}}</th>
                  <td>{{ $customer->name }}</td>
                  <td>{{ $customer->surname }}</td>
                  <td>{{ $customer->email }}</td>
                  <td>{{ $customer->cell }}</td>
                  <td class="text-center"><a data-toggle="modal" href="#{{$customer->id}}"><i class="fa fa-list" aria-hidden="true"></a></i></td>
                  <td class="text-center"><a href="/admin/customers/{{$customer->id}}"><i class="fa fa-car" aria-hidden="true"></i></a></td>
                  <td class="text-center"><a href="/admin/customers/{{$customer->id}}/edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                  <td class="text-center">
                    {!! Form::model($customer, array('route' => array('customers.destroy', $customer->id), 'method' => 'DELETE')) !!} 
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    {!! Form::close() !!}
                  </td>
                </tr>




                
              <!--MODAL-->
                <div id="{{$customer->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Customer Insurance Details</h4>
                          </div>
                          <div class="modal-body">
                            <p>Client: <strong class="pull-right"> {{$customer->name}} {{$customer->surnamce}}</strong></p>
                            <p>Insurance Name: <strong class="pull-right"> {{$customer->insurancename}}</strong></p>
                            <p>Insurance Number: <strong class="pull-right"> {{$customer->insurancenumber}}</strong></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </tbody>
            </table>
            {{ $customers->links()}}
            

            
                


        @else
            <div class="alert alert-danger">
              @if(isset($s))
                No Customers found by query: {{strtoupper($s)}}
              @else
                No Customers in database
              @endif 
            </div>
        @endif
            
    </div>
</div>
@endsection
