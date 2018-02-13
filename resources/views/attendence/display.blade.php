
@extends('layouts.app')
@section('styleSheets')
<style type="text/css">
	.table tr td,.table tr th
	{
		text-align: center;
	}
</style>
@stop
@section('content')

<div class="container">
	<div class="row"  >
			
				<a href="{{url('/attendence/create')}}">
					<button type="button" class="btn btn-primary">Create Employee Attendence</button>
				</a>
	</div>
	<div class="row"><br>
			<form>

			<label>Select Start Date and End Date To Search</label>	<input type="date" value="{{Request::get('from_date')}}" name="from_date">
				<input type="date" value="{{Request::get('to_date')}}" name="to_date">
				<input type="submit" class="btn btn-primary" value="GO">

			</form>
	</div><br>
	<div class="row">

		<form> 
				<label>Select Year</label>
				<select  name="year">
					<option value="2017">2017</option>
					<option value="2018">2018</option>
				</select>
				<label>Select Month</label>
				<select name="month">
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				
				<input type="submit" class="btn btn-primary" value="GO">
		</form><br>

	 	<table class="table table-bordered table-striped">
			<thead style=" background-color:lightblue">
				<tr>
					<th>EmployeeName</th>
					<th>Number Of Working Days</th>
		           	<th>Number of Presence Days</th>
		           	<th>Number Of Absence Days</th>
		           	
				</tr>

			</thead>

			<tbody >
				@foreach($employees as $employee)

				<tr style=" background-color:lightpink">
					<td>{{$employee->name}}</td>

					<td>{{$working_days}}</td>

					<td>{{$employee->attendences->count()}}</td>

					<td>{{$working_days - $employee->attendences->count() }}</td>
					
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
	
</div>

@stop
