@extends('layouts.app')
@section('content')


	<div class="container">
			<div class="row"  >
			
				<a href="{{url('/attendence/create')}}">
					<button type="button" class="btn btn-primary">Create Employee Attendence</button>
				</a>
	</div>


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
					               			value="{{$employee->id}}" 
					               			


					               			>{{$employee->name}}</label>
					               			
					            	

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
						               			value="{{$employee->id}}" >{{$employee->name}}</label><br>
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



@section('styleSheets')

<style type="text/css">
	.table tr td,.table tr th
	{
		text-align: center;
	}
</style>
@stop

<div class="container">


	
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










</div>
@endsection

