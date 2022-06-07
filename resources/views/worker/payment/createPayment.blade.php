@extends('layout.app')

@section('tittle','Create Payment')

@section('content')

<h3>Create Customer</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Create Payment </h6>
    </div>
	
    <div class="card-body">
	<div class="pull-right">
        <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
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
				<form action="{{ route('payments.store') }}" method="POST" >
					@csrf

					<div class="form-group">
					<label for="name">Name<i class="text-danger">*</i></label>
					<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
					<div class="form-group">
					<label for="paid">Paid<i class="text-danger">*</i></label>
					<input type="number" name="paid" class="form-control" placeholder="Paid">
					</div>
					<div class="form-group">
					<label for="trans_id">Transition Id<i class="text-danger">*</i></label>
					<input type="text" name="trans_id" class="form-control" placeholder="Transition Id">
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