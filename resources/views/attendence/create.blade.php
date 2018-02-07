@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-12">
     <div class="container">
	<form action="{{Request::url()}}" method="post">
		{{csrf_field()}}
	        <div class="page-header" align="center">
	              <h1>Create Employee Attendence</h1>
	        </div>
	        <table class="table table-bordered table-striped">
			<div>
				
	         <div width="10%">
	         	
	         		<tr>
				       		<td width="5%">	<label>Date</label></td>

				       		<td>	<input type="Date" name="date" /></td>
	       			</tr>
	         </div>
					
					<div>
		      			<tr>
					      	<td>	<label>WorkingDay</label></td>
					      	<td>	<label><input type="checkbox" name="workingday" value="1">Yes</label>
					      		<br>
					      		
					      	<label><input type="checkbox" name="workingday" value="0">No</label></td>
		      	    	</tr>
	      			</div>
		     </div>

			
			 <div width="10%">
	              
	          
             <tr>
             <td>
	         @foreach($employees as $employee)

	            	
	               		<label><input type="checkbox" name="employee_ids[]" 
	               			value="{{$employee->id}}">{{$employee->name}}</label><br>
	            	

	         @endforeach
	    	 </td>
			</tr>
	      	</div>

	      	

			
			<tr>	<td></td>
				<td><button type="submit" class="btn btn-default">SaveAttendence</button></td>
			</tr>
			</table>

	</form>
</div>
</div>
</div>
</div>
@endsection