@extends('layout.app')

@section('tittle','Create Customer')

@section('content')

<h3>Create Customer</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Create Customer </h6>
    </div>
	
    <div class="card-body">
	<div class="pull-right">
        <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
    </div>
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
				<form action="{{ route('customers.store') }}" method="POST">
					@csrf

					<div class="form-group">
					<label for="name">customer Name<i class="text-danger">*</i></label>
					<input type="text" name="name" class="form-control" placeholder="name">
					</div>
					<div class="form-group">
					<label for="email">customer Email<i class="text-danger">*</i></label>
					<input type="email" name="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
					<label for="phone">customer Phone<i class="text-danger">*</i></label>
					<input type="text" name="phone" class="form-control" placeholder="Phone">
					</div>
					<div class="text-right">
					<button type="submit" class="btn btn-primary">Create</button>
					</div>
				<form>      
			  </div>
		 </div>
    </div>
 </div>

@stop