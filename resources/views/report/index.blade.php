@extends('layouts.app')
@section('content')


<div class="container">

	<table class="table table-bordered table-striped">
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
			@foreach($monthly_salaries as $month_salary)
					<tr>

						<td>{{$month_salary->month->format('F, Y')}}</td>
						<td>{{$month_salary->employee->name}}</td>
						<td>{{$month_salary->present_days}}</td>
						<td>{{$month_salary->total_working_days}}</td>
						<td>{{$month_salary->basic_salary}}</td>
						<td>{{$month_salary->deduction}}</td>
						<td>{{$month_salary->net_salary}}</td>

					</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
