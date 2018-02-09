@extends('layouts.app')

@section('content')

@section('styleSheets')

@endsection

@section('content')




<div class="container">


<div class="panel panel-success">
    <div class="panel-heading">
    	<a href="{{url('/employee/create')}}" class="pull-left">
				<button type="button" class="btn btn-primary" >Add New Employee </button>
		</a>

    </div>
    <div class="panel-body">
    	<table class="table table-bordered table-striped">
		<thead style=" background-color:lightgreen">

			<tr>
				<th>Name</th>
	           	<th>PhoneNumber</th>
	           	<th>Mail</th>
	           	<th>Address</th>
	           	<th>MonthlySalary</th>
	           	<th>MonthlyReductions</th>
	           	<th>Actions</th>
			</tr>

		</thead>

		<tbody >
			@foreach($employees as $employee)

				<tr style="background-color:lightyellow">
					<td>{{$employee->name}}</td>
					<td>{{$employee->phone_number}}</td>
					<td>{{$employee->email}}</td>
					<td>{{$employee->address}}</td>
					<td>{{$employee->monthly_salary}}</td>
					<td>{{$employee->monthly_reductions}}</td>
			
				     <td>
				        <div class="" role="group" aria-label="...">
									<div class="btn-group" role="group">
									  <a href="{{url('employee/view/'.$employee->id)}}">
									     <button type="button" class="btn btn-info">View</button>
									  </a>
									</div>
									
									<div class="btn-group" role="group">
									  <a href="{{url('employee/edit/'.$employee->id)}}">
									     <button type="button" class="btn btn-success">Edit</button>
									  </a>
									</div>

								  <div class="btn-group" role="group">
								  	 <a href="{{url('employee/delete/'.$employee->id)}}">
								       <button type="button" class="btn btn-danger">Delete</button>
								     </a>
								  </div>

						</div>
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>

    </div>
  </div>


</div>
@endsection

@endsection
