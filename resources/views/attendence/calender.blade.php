@extends('layouts.app')
@section('content')

<div class="container">
	<div class="panel-heading">
    	<a href="{{url('/employee/create')}}" class="pull-right">
				<button type="button" class="btn btn-primary" >Add New Employee </button>
		</a>
    </div>
	<div align="center"><h1>Attendence</h1>
	</div>
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
			<?php 
			$total_days  	= 	$days + $day_of_week;
			$no_of_weeks 	= 	ceil($total_days/7);
			$temp_day    	= 	1;
			$temp_date 		= 	$date;
			?>
			@for ($i=0; $i < $no_of_weeks; $i++) 
			<tr>	  
				@for ($j=0; $j < 7; $j++) 

					@if($day_of_week >1)
						<td></td>
					<?php $day_of_week--;?>
					@else
						@if( $temp_day<=$days)
						<td  data-toggle='modal' data-target='#modal-{{$temp_day}}' >{{$temp_day}}
						<?php 
						$attendence 		= 	$attendences->filter(function($item) use($temp_date){
						return $item->date === 	$temp_date;
						})->first(); 
						$employees_present 	= 	$attendence ? $attendence->employees->count() : 0;
						$temp_date 			= 	strtotime("+1 day", strtotime($temp_date));
						$temp_date 			= 	date("Y-m-d", $temp_date); 
						?>
						<br>
						<label> {{$employees_present}}/ {{$employees->count()}}</label><br>

							@if($attendence && $attendence->workingday===1)
							<label>Workingday</label> 							        
							@endif  	
						</td>
						      	
						@else
						<td></td>
						@endif
						      	
						<?php $temp_day++;?>
					@endif
				@endfor
			</tr>
			@endfor
			
		</tbody>
		</table>

		</div>
		@for($i=1;$i<=$days;$i++)
		<div class="modal fade" id="modal-{{$i}}" role="dialog" >
			<div class="modal-dialog">
			      <!-- Modal content-->
			    <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">{{$date}}</h4>
			        </div>
			        <div class="modal-body">
				        <?php 
				      	$attendence = $attendences->filter(function($item) use($date){
				          	return $item->date 		===		$date;
				        })->first(); ?>
						@if($attendence)
						<form action="{{url('attendence/edit/'.$attendence->id)}}" method="post">
							{{csrf_field()}}
					        <div class="page-header" align="center" >
					              <h1>Update Employee</h1>
					        </div>
					        <div>
								<div width="10%" >
								<input type="hidden" name="date" value="{{$attendence->date}}"> 
					         	</div>
						    </div>
						    <div class="form-group">
							    <label>WorkingDay</label>
								<label><input type="checkbox" name="workingday" value="1"
									@if($attendence->workingday===1)
					               			 	checked ="checked"
					               	@endif
									/>Yes</label>
								<label><input type="checkbox" name="workingday" value="0"

									@if($attendence->workingday===0)
					               			 	checked ="checked"
					               	@endif
									>No</label>
						    </div>
							    
							<div width="10%" >
					        @foreach($employees as $employee)
					         	
					           <label><input type="checkbox" name="employee_ids[]" 
					               	value="{{$employee->id}}" 
									@if($attendence->employees->contains($employee->id))
					               	checked ="checked"
					               	@endif />{{$employee->name}}</label><br>
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
							<div class="form-group">
								<input type="hidden" name="date" value="{{$date}}"> 
						    </div>	
							<div class="form-group">
							    <label>WorkingDay</label>
								<label><input type="checkbox" name="workingday" value="1">Yes</label>
								<label><input type="checkbox" name="workingday" value="0">No</label>
						    </div>
							<div  class="form-group">
								@foreach($employees as $employee)
								<label><input type="checkbox" name="employee_ids[]" 
								            value="{{$employee->id}}">{{$employee->name}}
								</label><br>
								@endforeach
						    </div>
							<button type="submit" class="btn btn-default">SaveAttendence</button>
						</form>

			          	<p>No attendence create </p>
			          	@endif
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
		<div>
			<form> 
				<label>Select Year</label>
				<select  name="year" >
					<option   value="2017">2017</option>
					<option   value="2018">2018</option>
				</select>
				<label>Select Month</label>
				<select name="month"  >
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
				<thead >
				<tr>
				<th>EmployeeName</th>
				<th>Number Of Working Days</th>
			    <th>Number of Presence Days</th>
			    <th>Number Of Absence Days</					
			    </tr>
				</thead>
				<tbody >
				@foreach($employees1 as $employee)
				<tr >
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
@endsection

