@extends('layout.app')

@section('tittle','Create Customer')

@section('content')

<h3>Update Product</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Update Product </h6>
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
		   		<form action="{{url('product/'.$product->id)}}" method="post">
                   
                    @csrf
                    @method('put')
					  <div class="form-group">
					    <label for="name">Product Name<i class="text-danger">*</i></label>
					    <input type="text" value="{{$product->product_name}}" name='product_name' class="form-control" placeholder="name">
					  </div>
                      <div class="form-group">
					    <label for="name">Product Name<i class="text-danger">*</i></label>
					   <textarea name="description" class="form-control" placeholder="Description"  id="" cols="30" rows="10">{{$product->description}}</textarea>
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