@extends('layouts.app')
@section('content')
<div class="container">
	<h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  
  <div class="input-group date" data-provide="datepicker-inline">
    <input type="text" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</di>

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
</button>

		
		 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  </div>
  
@endsection