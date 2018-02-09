@extends('layouts.app')
@section('content')


	<div class="container">
	<h1>Display</h1>
		<div class="grid-calendar">
		
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						
						<th>Monday</th>
						<th>Tuesday</th>
						<th>Wednesday</th>
						<th>Thursday</th>
						<th>Friday</th>
						<th>Saturday</th>
						<th>Sunday</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
					
					@for($a=1;$a<=$days;$a++)
						
						<td   data-toggle="modal" data-target="#model-{{$a}}">{{$a}}</td>
						@if($a==$day_of_week||$a==11||$a==18||$a==25)
						</tr>
					    @endif

			  
					@endfor
				</tr>

				</tbody>
			</table>

		</div>
		@for($i=1;$i<=$days;$i++)
		<div class="modal fade" id="model-{{$i}}" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			        	
	  
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">{{$i}}</h4>

			        </div>

			        <div class="modal-body">
			          <?php 
			      			  
			      	  $attendence = $attendences->filter(function($item) use($date){
			          	return $item->date === $date;
			          })->first();
			         
			          ?>

			          @if($attendence)
			          <p>Some text in the modal. {{$i}}</p>

			
					<form action="edit/{$id}" method="post">
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
					               			value="{{$employee->id}}">{{$employee->name}}</label>
					            	

					         @endforeach
							
					      	</div>

							<div>
								<button type="submit" class="btn btn-success btn-xl">SaveAttendence</button>
							</div>

					</form>

				

			          @else

			          <form action="create" method="post">
					{{csrf_field()}}
	        <div class="page-header" align="center">
	              <h1>Create Employee Attendence</h1>
	        </div>
	        <table class="table table-bordered table-striped">
			
			<div>
				<tr>
      			<td width="20%">	<label>Date</label></td>

				<td>	<input type="Date" name="date" /></td>
	       		</tr>
	         </div>
					
			<div>
		      	<tr>
					<td><label>WorkingDay</label></td>
					     <td>	<label><input type="checkbox" name="workingday" value="1">Yes</label>
					      		<br>
					      		
					     <label><input type="checkbox" name="workingday" value="0">No</label></td>
		      	</tr>
	      	</div>
		     
			<div >
	            <tr>
		            <td width="5%">
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

			          <p>No attendence create </p>
			          @endif
			          {{$date}}
			          <?php 
			          		$date = strtotime("+1 day", strtotime($date));
							$date = date("Y-m-d", $date); 

						?>

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			        </div>
			        
			      </div>
			      
			    </div>
			  </div>
		@endfor

</div>
@endsection

