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

			
			 <div width="10%" style="background-color:pink">
	           
	         @foreach($employees as $employee)

	            	
	               		<label><input type="checkbox" name="employee_ids[]" 
	               			@if($attendence->employees->contains($employee->id))
	               			checked = 'checked'
	               			@endif
	               			value="{{$employee->id}}">{{$employee->name}}</label>
	            	

	         @endforeach
			
	      	</div>

			<div>
				<button type="submit" class="btn btn-success btn-xl">SaveAttendence</button>
			</div>

	</form>
</div>
@endsection