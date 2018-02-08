@extends('layouts.app')
@section('content')
<div class="page-header">
  <h1>Update Employee</h1>
</div>




<form class="form-horizontal" method="post" action="{{Request::url()}}">
 	{{csrf_field()}}
	  <div class="form-group">
	    <label class="control-label col-sm-2" >EmployeeName</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="name" placeholder="Enter FullName" value="{{$employee->name}}">
                    @if ($errors->has('name'))
                       <span class="help-block">
                           <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

		    </div>
	  </div>
	  
	  <div class="form-group">
	    <label class="control-label col-sm-2" >PhoneNumber</label>
		    <div class="col-sm-10">
		      <input type=text" class="form-control" name="phone_number" placeholder="Enter phonenumber" value="{{$employee->phonenumber}}" >
			        @if ($errors->has('phonenumber'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('phonenumber') }}</strong>
	                        </span>
	                @endif

		    </div>
	  </div>
 
	  <div class="form-group">
	         <label class="control-label col-sm-2" >MailId</label>
			    <div class="col-sm-10">
			      <input type=text" class="form-control" name="email" placeholder="Enter mailid" value="{{$employee->email}}">

                  @if ($errors->has('email'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                @endif


			    </div>
	  </div>
      
       <div class="form-group">
	    <label class="control-label col-sm-2" >salary</label>
			    <div class="col-sm-10">
			      

			      <input type="text" name="monthly_salary" placeholder="Enter salary" value="{{$employee->monthlysalary}}">
                   
                   @if ($errors->has('monthlysalary'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('monthlysalary') }}</strong>
	                        </span>
	                @endif

			    </div>
	  </div>



      <div class="form-group">
	    <label class="control-label col-sm-2" >Adress</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="address" placeholder="Enter address">{{$employee->address}}</textarea>
                   
                   @if ($errors->has('address'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('address') }}</strong>
	                        </span>
	                @endif

			    </div>
	  </div>

	   <div class="form-group">

	    <label class="control-label col-sm-2" >Monthly Reductions</label>
			    <div class="col-sm-10">

			      <input type="text" name="monthly_reductions" placeholder="Enter monthlyreductions" value="{{$employee->monthlyreductions}}">
                   
                   @if ($errors->has('monthlyreductions'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('monthlyreductions') }}</strong>
	                        </span>
	                @endif

			    </div>
	  </div>


	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Save</button>
	    </div>
	  </div>
</form> 

@endsection