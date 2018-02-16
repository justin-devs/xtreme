@extends('employee.layout.auth')

@include('employee.messages')
@section('content')
<div class="container">
    <div class="row">
            @foreach($employees as $employee)

                <div class="col-xs-2 " >
                    <button class="btn btn-info" data-toggle="modal" data-target="#{{$employee->id}}">{{$employee->name}} {{$employee->surname}}</button>
                </div>
             @endforeach
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-center lightgray">Available Jobs</h3>
            @foreach($jobs as $job)
                @if(!$job->employee)
                <div class="col-xs-4">
                    <div class="box red">
                        <p>Needs: <span class="label label-info">{{$job->job_description}}</span></p>

                        <p>Vehicle: <span class="label label-info">{{$job->vehicle->registration}}</span></p>
                        <p>Added: <span class="label label-info">{{$job->created_at}}</span></p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="col-sm-6">
            <h3 class="text-center lightgray">Active Jobs</h3>
            @foreach($jobs as $job)
                @if($job->employee)
                    <div class="col-xs-4">
                    <div class="box orange">
                        <p>Activity: <span class="label label-info">{{$job->job_description}}</span></p>
                        <p>Assigned to: <span class="label label-info">{{$job->employee->name}}</span> at <span class="label label-info">{{$job->updated_at}}</span></p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
</div>
@foreach($employees as $employee)
    <!-- Trigger the modal with a button -->
        <!-- Modal -->
        <div id="{{$employee->id}}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <br>
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/employee/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            
                            <div class="col-md-6">
                                <input id="{{$employee->id}}password" type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="employeeid" class="col-md-4 control-label">ID</label>
                            <div class="col-md-6">
                                <input id="employeeid" class="form-control" value="{{$employee->employeeid}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
              </div>
            </div>

          </div>
        </div>
@endforeach
@endsection
@section('scripts')
<script type="text/javascript">

    $(function() {

        // Set NumPad defaults for jQuery mobile. 
        // These defaults will be applied to all NumPads within this document!
        $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';

        $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
        $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control  input-lg" />';
        $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default btn-lg"></button>';
        $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn btn-lg" style="width: 100%;"></button>';
        $.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-primary');
    };
        
        // Instantiate NumPad once the page is ready to be shown
        
    });
    $(document).ready(function(){
        @foreach($employees as $employee)
            $('#{{$employee->id}}password').numpad();
        @endforeach
        });

</script>
@endsection
