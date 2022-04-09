@extends('layout.app')

@section('tittle','Create Customer')

@section('content')

<h3>Update Customer info</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Update Customer info </h6>
    </div>
    <div class="card-body">
      <div class="row justify-content-md-center">
	       <div class="col-md-6"> 
		    	@if ($errors->any())
		    		<div class="alert alert-danger">
		    			<ul>
		    				@foreach ($errors->all() as $error)
		    					<li>{{ $error }}</li>
		    				@endforeach
		    			</ul>
		    		</div>
		    	@endif
		   		<form action="">
					  <div class="form-group">
					    <label for="name">customer Name<i class="text-danger">*</i></label>
					    <input type="text" class="form-control" placeholder="name">
					  </div>
					  <div class="form-group">
					    <label for="email">customer Email<i class="text-danger">*</i></label>
					    <input type="email" class="form-control" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <label for="phone">customer Phone<i class="text-danger">*</i></label>
                        <input type="email" class="form-control" placeholder="Phone">
					  </div>
					  <div class="text-right">
					  	<button type="submit" class="btn btn-primary">update</button>
					  </div>
				<form>      
			  </div>
		 </div>
    </div>
 </div>

@stop