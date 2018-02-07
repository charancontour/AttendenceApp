@extends('layouts.app')
@section('content')


<div class="container">

	<table class="table">
		<thead>

			<tr>
				<th>Month</th>
				<th>EmployeeName</th>
	           	<th>Presentdays</th>
	           	<th>Total Working Days</th>
	           	<th>Basic Salary</th>
	           	<th>Deduction</th>
	           	<th>NetSalary</th>
	           	
			</tr>

		</thead>

		<tbody>
			@foreach($monthlysalaries as $monthsalary)
					<tr>
						<td>{{$monthsalary->month}}</td>
						@foreach($employees as $employee)
							@if($monthsalary->employee_id==$employee->id)
					
								<td>{{$employee->name}}</td>
							@endif
						@endforeach	
					
						<td>{{$monthsalary->present_days}}</td>
						<td>{{$monthsalary->total_working_days}}</td>
						<td>{{$monthsalary->basic_salary}}</td>
						<td>{{$monthsalary->deduction}}</td>
						<td>{{$monthsalary->net_salary}}</td>
					
					</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
