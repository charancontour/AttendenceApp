@extends('layouts.app')
@section('content')

<div class="page-header" align="center">
  <h1><span class="label label-primary">Details Of An Employee</span></h1>

</div>
<div class="container">
      <table class="table table-bordered table-striped" >
        <tbody  >
          <tr >
            <td width="20%" style="background-color:lightpink">Employee Name</td>
            <td style="background-color:lightyellow">{{$employee->name}}</td>
          </tr>
          <tr >
            <td style="background-color:lightpink">Phone Number</td>
            <td style="background-color:lightyellow">{{$employee->phone_number}}</td>
          </tr>
          <tr>
            <td style="background-color:lightpink">Email</td>
            <td style="background-color:lightyellow">{{$employee->email}}</td>
          </tr>
          <tr>
            <td style="background-color:lightpink">Address</td>
            <td style="background-color:lightyellow">{{$employee->address}}</td>
          </tr>
          <tr>
            <td style="background-color:lightpink">Basic Salary</td>
            <td style="background-color:lightyellow">{{$employee->monthly_salary}}</td>
          </tr>
           <tr>
            <td style="background-color:lightpink">Monthly Reductions</td>
            <td style="background-color:lightyellow">{{$employee->monthly_reductions}}</td>
          </tr>
        </tbody>
      </table>
</div>

@endsection
