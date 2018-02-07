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
		<div class="col-md-12">
			<a href="/employee">
				<button type="button" class="btn btn-primary">Employees</button>
			</a>

		</div>
		
	</div>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Date</th>
	           	<th>Noof presenties</th>
	           	<th>Actions</th>
			</tr>

		</thead>

		<tbody>
			@foreach($attendences as $attendence)

			<tr>
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
