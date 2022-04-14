@extends('layout.app')

@section('tittle','sale invoice')

@section('content')
<div class="row clearfix mb-4" >
	<div class="col-md-4">
	<h3 >Purchase invoice details</h3>	
	</div>

	<div class="col-md-8 text-right">
		<a href="#" class="btn btn-info btn-sm"><i class="fa fa-save"> print invoice</i></a>
	</div>
</div>



<div class="row clearfix">
	<div class="col-md-2">
    <div class="nav flex-column nav-pills" >
	<a href="{{url('supplier',$supplier->id)}}" class="btn btn-primary text-left">Supplier Information</a>
	<a href="{{ route('supplierInvoice.show',$supplier->id) }}" class="btn btn-secondary mt-1 text-left">Invoice</a>
	<a href="{{ route('supplierPayment.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('supplierRefund.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Refund</a>
</div>
    </div>
    <div class="col-md-9">
		<div class="col-md-4">
			<a href="{{ route('supplierInvoice.show',['supplier_id'=>$supplier->id]) }}" class="btn btn-primary mb-2"> <i class="fa fa-arrow-left"></i> Back </a>
		</div>
    	<div class="card shadow mb-4">
			@if(Session::has('message'))
    <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
    <div>
@endif
@if(Session::has('error'))
    <div class="alert alert-success">
        <p>{{ Session::get('error') }}</p>
    <div>
@endif

            <div class="card shadow mb-4">
			    <div class="card-header py-3">
					<button type="button" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal" data-target="#add_product">
						<i class="fa fa-plus"></i> Add Product 
				  </button>

				  <button type="button" class="btn btn-success btn-sm mt-2 mb-2 " data-toggle="modal" data-target="#add_receipt">
						<i class="fa fa-plus"></i> Add Payment 
				  </button>
			      <h6 class="m-0 font-weight-bold text-primary"> Purchase invoice details </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md">
			    		<div class="col-md-6 ">
			    			<p><strong>Supplier : </strong>{{ $supplier->name }}</p>
			    			<p> <strong>Email :</strong> </strong>{{ $supplier->email }}</p>
			    			<p> <strong>Phone : </strong>{{ $supplier->phone }}</p>
			    		</div>

			    		<div class="col-md-6 ">
			    			<p><strong>Date : </strong>{{ $invoice->date }}</p>
			    			<p> <strong>Challan No : </strong>IT87TH87v</p>
			    		</div>
			    	</div>	
			    	<table class="table table-borderless">
			    		<thead>
			    			<th>SL</th>
			    			<th>Product</th>
			    			<th>Quantity</th>
			    			<th>Price</th>
			    			<th>Total</th>
			    			<th></th>
			    		</thead>

			    		<tfoot>
			    			
			    			
			    		</tfoot>

			    		<tbody>
							<?php $i=0; $total = 0;?>
			    			@foreach ($supplier->invoice_item as $item)
								
							
			    			<tr>
			    				<td>{{++$i}}</td>
			    				<td>{{$item->product_name}}</td>
			    				<td>{{$item->quantity}}</td>
			    				<td>{{$item->unit_price}}</td>
			    				<td>{{$item->quantity * $item->unit_price }}</td>
								<?php $total += $item->quantity * $item->unit_price?>
			    			
			    				<td>
			    				
			                          <a onclick="return  confirm('Are you sure?')" href="{{ url('supplier/invoice/'.$item->id.'/item') }}" type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
                               
			    				</td>
			    			</tr>	
							@endforeach		    						    		
			    			<th>
			    				

			    			</th>
			    			<th colspan="3" class="text-right">Total : </th>
			    			<th>{{ $total }}</th>
			    			<th></th>

			    			<tr>
			    				<td colspan="4" class="text-right"><strong> Pay : </strong></td>
			    				<td  class="text-left"><strong> {{ $total_pay }} </strong></td>
			    			</tr>

			    			<tr>
			    				<td colspan="4" class="text-right"><strong> Due : </strong></td>
			    				<td  class="text-left"><strong> {{$total-$total_pay}} </strong></td>
			    			</tr>

			    		</tbody>
			    	</table>
			    </div>
			  </div>                 
		</div>
    </div>
</div>
@stop


<!-- Add model -->

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   
    	
    	{!! Form::open([ 'route' => ['supplier.invoiceitem.store', ['invoice_id' => $invoice->id, 'supplier_id' => $supplier->id] ], 'method' => 'post' ]) !!}
		@csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> Add Product </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
		  <div class="form-group row">
		    <label for="product" class="col-sm-3 col-form-label text-right">Product <span class="text-danger">*</span> </label>
		    <div class="col-sm-9">

		      <select name="product" id="" class="form-control">
				<option value="">Select Product</option>
					@foreach ($products as $product)
					   <option value='{"name":"{{$product->product_name}}","id":"{{$product->id}}"}'>{{$product->product_name}}</option>
						{{-- <option value="{{$product->product_name}}">{{$product->product_name}}</option> --}}
					@endforeach
			  </select>
		    </div>
		</div>

          <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label text-right"> Quantity <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('quantity', NULL, [ 'class'=>'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity', 'required'  ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label text-right"> Unit price <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('unit_price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'placeholder' => 'Unit price', 'required' ]) }}
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button> 
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>

<!-- Modal for Add receipt -->

<div class="modal fade" id="add_receipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   
    <form action="{{ route('supplier.payment.store',['supplier_id'=>$supplier->id,'invoice_id'=>$invoice->id]) }}" method="post">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> New Sale </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
          <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
            <div class="col-sm-9">
            <input type="date" name="date" class="form-control" placeholder='date'>
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
                <input type="text" name="amount" class="form-control" placeholder='Amount'>
            </div>
          </div>

          <div class="form-group row">
            <label for="note" class="col-sm-3 col-form-label">Note </label>
            <div class="col-sm-9">
              <textarea name="note" placeholder='note' class='form-control' id="" cols="10" rows="10"></textarea>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button> 
        </div>
      </div>
</form>
  </div>
</div>



