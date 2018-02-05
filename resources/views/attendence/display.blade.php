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
	<div class="row">
		<form>
			<input type="date" value="{{Request::get('from_date')}}" name="from_date">
			<input type="date" value="{{Request::get('to_date')}}" name="to_date">
			<input type="submit" class="btn btn-primary" value="GO">
		</form>
	</div>
	<div class="row">
		<div class="col-md-12">
	 	
			<label>select Month</label>
					<select name="month">
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>

	 	<table class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>EmployeeName</th>
				<th>Number Of Working Days</th>
	           	<th>Number of Presence Days</th>
	           	<th>Number Of Absence Days</th>
			</tr>

		</thead>

		<tbody>
			@foreach($employees as $employee)
               
			<tr>
				<td>{{$employee->name}}</td>

				<td>{{$working_days}}</td>
				
				<td>{{$employee->attendences->count()}}</td>
				
				<td>{{$working_days - $employee->attendences->count() }}</td> 
				
			</tr>
			@endforeach
		</table>



</div>
</div>
</div>


	

@stop
