@extends('layouts.app')
@section('content')
<div class="container">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr >
            <td width="20%">Name</td>
            <td>{{$employee->name}}</td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>{{$employee->phonenumber}}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{$employee->email}}</td>
          </tr>
          <tr>
            <td>Address</td>
            <td>{{$employee->address}}</td>
          </tr>
          <tr>
            <td>Salary</td>
            <td>{{$employee->salary}}</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection
