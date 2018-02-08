@extends('layouts.app')
@section('content')
<div class="container">

 <form class="form-horizontal" method="post" action="{{Request::url()}}">
 	{{csrf_field()}}
	  <div class="form-group">
	    <label class="control-label col-sm-2" >EmployeeName</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="name" placeholder="Enter FullName" >
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
		      <input type=text" class="form-control" name="phone_number" placeholder="Enter phonenumber" >
			        @if ($errors->has('phone_number'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('phone_number') }}</strong>
	                        </span>
	                @endif

		    </div>
	  </div>
 
	  <div class="form-group">
	         <label class="control-label col-sm-2" >MailId</label>
			    <div class="col-sm-10">
			      <input type=text" class="form-control" name="email" placeholder="Enter mailid" >

                  @if ($errors->has('email'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                @endif


			    </div>
	  </div>
  
       

<div class="form-group">
	    <label class="control-label col-sm-2" >Salary</label>
			    <div class="col-sm-10">
			      <input type="text" name="monthly_salary" placeholder="Enter salary">
                   @if ($errors->has('monthly_salary'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('monthly_salary') }}</strong>
	                        </span>
	                @endif

			    </div>
	  </div>





      <div class="form-group">
	    <label class="control-label col-sm-2" >Adress</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="address" placeholder="Enter address" ></textarea>
                   
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
			       <input type="text" name="monthly_reductions" placeholder="Enter monthlyreductions">
			     
                   
                   @if ($errors->has('monthly_reductions'))
	                       <span class="help-block">
	                           <strong>{{ $errors->first('monthly_reductions') }}</strong>
	                        </span>
	                @endif

			    </div>
	  </div>


	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Create</button>
	    </div>
	  </div>
</form> 
</div>
@endsection