@extends('layouts.app')

@section('content')

@section('styleSheets')

@endsection

@section('content')




<div class="container">

	<div class="row">
		<div class="col-md-12">
			<a href="{{url('/attendence/create')}}">
				<button type="button" class="btn btn-primary" class="pull-right">Create Employee Attendence</button>
			</a>
			<a href="{{url('/employee/create')}}">
				<button type="button" class="btn btn-primary" class="pull-left">Add New Employee </button>
			</a>


		</div>
		
	</div>

			
	<table class="table">
		<thead>

			<tr>
				<th>Name</th>
	           	<th>Phonenumber</th>
	           	<th>Mail</th>
	           	<th>Address</th>
	           	<th>MonthlySalary</th>
	           	<th>MonthlyReductions</th>
	           	<th>Actions</th>
			</tr>

		</thead>

		<tbody>
			@foreach($employees as $employee)

				<tr>
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
									     <button type="button" class="btn btn-default">View</button>
									  </a>
									</div>
									
									<div class="btn-group" role="group">
									  <a href="{{url('employee/edit/'.$employee->id)}}">
									     <button type="button" class="btn btn-default">Edit</button>
									  </a>
									</div>

								  <div class="btn-group" role="group">
								  	 <a href="{{url('employee/delete/'.$employee->id)}}">
								       <button type="button" class="btn btn-default">Delete</button>
								     </a>
								  </div>

						</div>
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@endsection
