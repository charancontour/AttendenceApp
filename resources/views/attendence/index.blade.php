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
	
		<div class="col-md-12" >
			<a href="{{url('/attendence/create')}}" class="pull-right">
				<button type="button" class="btn btn-primary btn-xs" >Create Employee Attendence</button>
			</a>
		</div>
		
	<div class="page-header" style="background-color:lightblue" align="center" >
 	 <h1>Daily Report</h1>
	</div>
	
	<table class="table table-bordered table-striped">
		<thead style=" background-color:lightgreen">
			<tr>
				<th>Date</th>
	           	<th>Noof presenties</th>
	           	<th>Actions</th>
			</tr>

		</thead>

		<tbody>
			@foreach($attendences as $attendence)

			<tr style=" background-color:lightyellow">
				<td>{{$attendence->date}}</td>
				<td>{{$attendence->employees()->count()}}</td>
				
	            <td width="30%">
	                   <div class="" role="group" aria-label="...">
						  <div class="btn-group" role="group">
						  	   <a href="{{url('attendence/edit/'.$attendence->id)}}">
						              <button type="button" class="btn btn-default btn-small">Edit</button>
						       </a>
						  </div>

	                    </div>

	            </td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop
