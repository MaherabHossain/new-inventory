@extends('layout.app')

@section('tittle','Update Worker')

@section('content')

<h3>Update Worker info</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Update Worker info </h6>
    </div>
    <div class="card-body">
		<div class="pull-right">
        	<a class="btn btn-primary" href="{{ route('workers.index') }}"> Back</a>
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
		   		
    				<form action="{{ route('workers.update',$worker->id) }}" method="POST" enctype="multipart/form-data"  novalidate="">
						@csrf
        				@method('PUT')

					<div class="form-group">
					<label for="payment_id">Transition Id<i class="text-danger">*</i></label>
					<select name="payment_id" id="payment_id" class="form-control">
					<option value="" selected="" disabled="">Select A Transition Id</option>
					@foreach($payments as $payment)
                      <option value="{{ $payment->id }}">{{ $payment->trans_id }}</option>
                    @endforeach
					</select>
					</div>
					<div class="form-group">
					<label for="name">Worker Name<i class="text-danger">*</i></label>
					<input type="text" name="name" class="form-control" value="{{$worker->name}}" placeholder="Name">
					</div>
					<div class="form-group">
					<label for="q_id">QID Number<i class="text-danger">*</i></label>
					<input type="number" name="q_id" class="form-control" value="{{$worker->q_id}}" placeholder="QID Number">
					</div>
					<div class="form-group">
					<label for="q_id_Exp">QID Expiry<i class="text-danger">*</i></label>
					<input type="date" name="q_id_Exp" class="form-control" value="{{$worker->q_id_Exp}}" placeholder="QID Expiry">
					</div>
					<div class="form-group">
					<label for="pp">PP Number<i class="text-danger">*</i></label>
					<input type="number" name="pp" class="form-control" value="{{$worker->pp}}" placeholder="PP Number">
					</div>
					<div class="form-group">
					<label for="pp_exp">PP Expiry<i class="text-danger">*</i></label>
					<input type="date" name="pp_exp" class="form-control" value="{{$worker->pp_exp}}" placeholder="PP Expiry">
					</div>
					<div class="form-group">
					<label for="pp_img">PP Image<i class="text-danger">*</i></label>
					<input type="file" name="pp_img" class="form-control">
					<img src="{{ asset('/worker/PPimg/'.$worker->pp_img) }}" style="height:80px;width:80px;">
					</div>
					<div class="form-group">
					<label for="q_id_img">QID Image<i class="text-danger">*</i></label>
					<input type="file" name="q_id_img" class="form-control">
					<img src="{{ asset('/worker/QidImg/'.$worker->q_id_img) }}" style="height:80px;width:80px;">
					</div>
					<div class="form-group">
					<label for="user_img">User Image<i class="text-danger">*</i></label>
					<input type="file" name="user_img" class="form-control">
					<img src="{{ asset('/worker/userImg/'.$worker->user_img) }}" style="height:80px;width:80px;">
					</div>
					<div class="form-group">
					<label for="service">Choose a Service<i class="text-danger">*</i></label>
					<Select name="service" class="form-control">
						<option value="Designer">Designer</option>
						<option value="worker">worker</option>
						<option value="Devoloper">Devoloper</option>
					</Select>
					</div>
					<div class="form-group">
					<label for="amount">Total Amount<i class="text-danger">*</i></label>
					<input type="number" name="amount" class="form-control" value="{{$worker->amount}}" placeholder="Total Amount">
					</div>
					<div class="form-group">
					<label for="remark">Remark<i class="text-danger">*</i></label>
					<input type="text" name="remark" class="form-control" value="{{$worker->remark}}" placeholder="Remark">
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