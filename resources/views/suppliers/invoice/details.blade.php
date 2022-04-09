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
	<a href="{{url('customers/3')}}" class="btn btn-primary text-left">Supplier Information</a>
	<a href="{{ route('supplierInvoice.show',3) }}" class="btn btn-secondary mt-1 text-left">Invoice</a>
	<a href="{{ route('supplierPayment.show',3) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('supplierRefund.show',3) }}" class="btn btn-primary mt-1 text-left">Refund</a>
</div>
    </div>
    <div class="col-md-9">
    	<div class="card shadow mb-4">
            <div class="card shadow mb-4">
			    <div class="card-header py-3">

			      <h6 class="m-0 font-weight-bold text-primary"> Purchase invoice details </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md">
			    		<div class="col-md-6 ">
			    			<p><strong>Customer : </strong>Maherab</p>
			    			<p> <strong>Email :</strong> </strong>maherab@gmail.com</p>
			    			<p> <strong>Phone : </strong>01838383822</p>
			    		</div>

			    		<div class="col-md-6 ">
			    			<p><strong>Date : </strong>4-2-2020</p>
			    			<p> <strong>Challan No : </strong>IT87TH87Y</p>
			    		</div>
			    	</div>

			    	  @if(session('message'))
			            <div class="alert alert-success" role="alert">
			                <h5>{{ session('message') }}</h5>
			            </div>
			         @endif
			    	<table class="table table-borderless">
			    		<thead>
			    			<th>SL</th>
			    			<th>Product</th>
			    			<th>Price</th>
			    			<th>Quantity</th>
			    			<th>Unit price</th>
			    			<th>Total</th>
			    			<th></th>
			    		</thead>

			    		<tfoot>
			    			
			    			
			    		</tfoot>

			    		<tbody>
			    			
			    			<tr>
			    				<td>1</td>
			    				<td>HP monitor</td>
			    				<td>11000</td>
			    				<td>3</td>
			    				<td>1000</td>
			    				<td>9999</td>
			    				<td>
			    					<form>
			                          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
                                </form>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>1</td>
			    				<td>HP monitor</td>
			    				<td>11000</td>
			    				<td>3</td>
			    				<td>1000</td>
			    				<td>9999</td>
			    				<td>
			    					<form>
			                          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
                                </form>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>1</td>
			    				<td>HP monitor</td>
			    				<td>11000</td>
			    				<td>3</td>
			    				<td>1000</td>
			    				<td>9999</td>
			    				<td>
			    					<form>
			                          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
                                </form>
			    				</td>
			    			</tr>
			    		
			    			<th>
			    				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_product">
						        	 <i class="fa fa-plus"></i> Add Product 
						       </button>

						       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_receipt">
						        	 <i class="fa fa-plus"></i> Add Payment 
						       </button>

			    			</th>
			    			<th colspan="4" class="text-right">Total : </th>
			    			<th>1000</th>
			    			<th></th>

			    			<tr>
			    				<td colspan="5" class="text-right"><strong> Pay : </strong></td>
			    				<td  class="text-right"><strong> 10002 </strong></td>
			    			</tr>

			    			<tr>
			    				<td colspan="5" class="text-right"><strong> Due : </strong></td>
			    				<td  class="text-right"><strong> 30303 </strong></td>
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
   
    	
    	{!! Form::open([ 'route' => ['customer.invoice.payment.store', ['customer_id' => 4, 'invoice_id' => 5] ], 'method' => 'post' ]) !!}

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

		      {{ Form::select('product_id', ['hp','iphone','mac'], NULL, [ 'class'=>'form-control', 'id' => 'product', 'required', 'placeholder' => 'Select Product' ]) }}
		    </div>
		</div>

          <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label text-right"> Quantity <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('quantity', NULL, [ 'class'=>'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label text-right"> Unit price <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'placeholder' => 'Unit price', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="totla" class="col-sm-3 col-form-label text-right"> Total <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('totla', NULL, [ 'class'=>'form-control', 'id' => 'totla', 'placeholder' => 'Total', 'required' ]) }}
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
   
    {!! Form::open([ 'route' => ['customer.invoice.receipt.store', ['customer_id'=>3,'invoice_id' => 4 ]], 'method' => 'post' ]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="newPaymentModalLabel"> New Payments </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
          <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label text-right"> Date <span class="text-danger">*</span> </label>
            <div class="col-sm-9">
              {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label text-right">Amount <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="note" class="col-sm-3 col-form-label text-right">Note </label>
            <div class="col-sm-9">
              {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
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



