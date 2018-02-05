@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{Request::url()}}" method="post">
		{{csrf_field()}}
	        <div class="page-header" align="center">
	              <h1>UpdateEmployee</h1>
	        </div>

			<div>
				
	         <div width="10%">
	         	
	       			<label>Date {{$attendence->date}}</label>

	       			<!-- <label name="date">{{$attendence->date}}</label> -->
	       			<input type="hidden" name="date" value="{{$attendence->date}}"> 

	         </div>
			
		     </div>

			
			 <div width="10%">
	              
	          

	         @foreach($employees as $employee)

	            	
	               		<label><input type="checkbox" name="employee_ids[]" 
	               			value="{{$employee->id}}">{{$employee->name}}</label>
	            	

	         @endforeach
			
	      	</div>

			<div>
				<button type="submit" class="btn btn-default">SaveAttendence</button>
			</div>

	</form>
</div>
@endsection