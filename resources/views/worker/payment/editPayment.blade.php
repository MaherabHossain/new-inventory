@extends('layout.app')

@section('tittle','Update Payment')

@section('content')

<h3>Update Payment info</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Update Payment info </h6>
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
		   		
    				<form action="{{ route('payments.update',$payment->id) }}" method="POST">
						@csrf
        				@method('PUT')

					<div class="form-group">
					<label for="name">Name<i class="text-danger">*</i></label>
					<input type="text" name="name" class="form-control" value="{{$payment->name}}" placeholder="Name">
					</div>
					<div class="form-group">
					<label for="paid">Paid<i class="text-danger">*</i></label>
					<input type="number" name="paid" class="form-control" value="{{$payment->paid}}" placeholder="Paid">
					</div>
					<div class="form-group">
					<label for="trans_id">Transition Id<i class="text-danger">*</i></label>
					<input type="text" name="trans_id" class="form-control" value="{{$payment->trans_id}}" placeholder="Transition Id">
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