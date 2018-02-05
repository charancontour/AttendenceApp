@extends('layouts.app')
@section('content')


<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<table class="table">
	<thead>

		<tr>
			<th>Name</th>
           	<th>phonenumber</th>
           	<th>mail</th>
           	<th>address</th>
           	<th>salary</th>
           	<th>Actions</th>
		</tr>

	</thead>

	<tbody>
		@foreach($employees as $employee)

		<tr>
			<td>{{$employee->name}}</td>
			<td>{{$employee->phonenumber}}</td>
			<td>{{$employee->email}}</td>
			<td>{{$employee->address}}</td>
			<td>{{$employee->amount}}</td>
            <td>
                   <div class="" role="group" aria-label="...">
					  <div class="btn-group" role="group">
					  	   <a href="{{url('employee/edit/'.$employee->id)}}">
					              <button type="button" class="btn btn-default">Edit</button>
					       </a>
					  </div>


					  <div class="btn-group" role="group">
					  	 <a href="{{url('employee/delete/'.$employee->id)}}">
					       <button type="button" class="btn btn-default">Delete</button>
					     </a>
					  </div>
					  <div class="btn-group" role="group">
					  	 <a href="{{url('attendence/employees')}}">
					       <button type="button" class="btn btn-default">Attendence</button>
					     </a>

                    </div>

            </td>
		</tr>
		@endforeach
	</tbody>


</table>
</div>

@endsection