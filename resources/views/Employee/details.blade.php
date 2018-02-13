@extends('layouts.app')
@section('content')

<div class="page-header" align="center">
  <h1><span class="label label-primary">Details Of An Employee</span></h1>

</div>
<div class="container">
      <table class="table table-bordered table-striped" >
        <tbody  >
          <tr >
            <td width="20%" >Employee Name</td>
            <td >{{$employee->name}}</td>
          </tr>
          <tr >
            <td >Phone Number</td>
            <td >{{$employee->phone_number}}</td>
          </tr>
          <tr>
            <td >Email</td>
            <td >{{$employee->email}}</td>
          </tr>
          <tr>
            <td >Address</td>
            <td >{{$employee->address}}</td>
          </tr>
          <tr>
            <td >Basic Salary</td>
            <td >{{$employee->monthly_salary}}</td>
          </tr>
           <tr>
            <td >Monthly Reductions</td>
            <td >{{$employee->monthly_reductions}}</td>
          </tr>
        </tbody>
      </table>
</div>

@endsection
