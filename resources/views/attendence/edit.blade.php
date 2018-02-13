@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{Request::url()}}" method="post">
		{{csrf_field()}}
	        <div class="page-header" align="center" style="background-color:lightblue">
	              <h1>Update Employee</h1>
	        </div>

			<div>
				
		        <div width="10%" style="background-color:lightgrey">
		         	
		       		<label>Date :{{$attendence->date}}</label>

		       		<input type="hidden" name="date" value="{{$attendence->date}}"> 

		        </div>
			
		    </div>
		    <div class="form-group">
				<label>WorkingDay</label>
				<label><input type="checkbox" name="workingday" value="1" 
					@if($attendence->workingday===1)
					     checked ="checked"
					@endif>Yes</label>
				<label><input type="checkbox" name="workingday" value="0"
					@if($attendence->workingday===0)
					    checked ="checked"
					@endif
					>No</label>
							      	
			</div>
			
			 <div width="10%" style="background-color:pink">
	           
	         @foreach($employees as $employee)

	            	
	        <label> <input type="checkbox" name="employee_ids[]"  value="{{$employee->id}}" 
	        	@if($attendence->employees->contains($employee->id))
				 	checked ="checked"
				@endif >{{$employee->name}}</label>

	         @endforeach
	               

			
	      	</div>

			<div>
				<button type="submit" class="btn btn-success btn-xl">SaveAttendence</button>
			</div>

	</form>
</div>
@endsection