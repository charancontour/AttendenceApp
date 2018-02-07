@extends('layouts.app')
@section('content')

<div class="row">
		<div class="col-md-12">
			<a href="/attendence/create">
				<button type="button" class="btn btn-primary">Create Employee Attendence</button>
			</a>

		</div>
		
	</div>

<table class="table">
	<thead>

		<tr>
			<th>Name</th>
           	<th>phonenumber</th>
           	<th>mail</th>
           	<th>address</th>
           	<th>MonthlySalary</th>
           	<th>MonthlyReductions</th>
           	<th>Actions</th>
		</tr>

	</thead>

	<tbody>
		@foreach($employees as $employee)

		<tr>
			<td>{{$employee->name}}</td>
			<td>{{$employee->phonenumber}}</td>
			<td>{{$employee->email}}</td>
			<td>{{$employee->address}}</td>
			<td>{{$employee->monthlysalary}}</td>
			<td>{{$employee->monthlyreductions}}</td>
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
@endsection