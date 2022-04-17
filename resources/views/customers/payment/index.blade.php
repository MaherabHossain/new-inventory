@extends('layout.app')

@section('tittle','Customer')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Customer Payment</h3>	
	</div>
	<div class="col-md-6 text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_sale">
		<!-- <a href="{{ url('invoice/create') }}" class="btn btn-primary">  -->
            <i class="fa fa-plus">

        </i> Add payment </a>
	</div>
</div>

<div class="row clearfix">
	<div class="col-md-2">
    <div class="nav flex-column nav-pills" >
	<a href="{{url('customers/'.$customer->id)}}" class="btn btn-primary text-left">Customer Information</a>
	<a href="{{ route('customerInvoice.show',$customer->id) }}" class="btn btn-primary mt-1 text-left">Invoice</a>
	<a href="{{ route('customerPayment.show',$customer->id) }}" class="btn btn-secondary mt-1 text-left">Payment</a>
	<a href="{{ route('customerRefund.show',$customer->id) }}" class="btn btn-primary mt-1 text-left">Refund</a>
</div>


    </div>
    
    <div class="col-md-9">
    	<!-- DataTales Example -->
      @if ($errors->any())
		    		<div class="alert alert-danger">
		    			<ul>
		    				@foreach ($errors->all() as $error)
		    					<li>{{ $error }}</li>
		    				@endforeach
		    			</ul>
		    		</div>
		    	@endif
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

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
              @foreach ($customer->payment as $payment)
                  
              
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->note }}</td>
                    <td class="text-center">
                      <form action="{{ route('customer.payment.delete',['payment_id'=>$payment->id,'customer_id'=>$customer->id]) }}" method="post" >
                        @csrf
                        @method('delete')
                        <a href="{{ route('customer.payment.show',['payment_id'=>$payment->id,'customer_id'=>$customer->id]) }}" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                       
                        <button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                      </form>
                      </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
</div>
    </div>
</div>
@stop
<!-- modal -->

<div class="modal fade" id="add_sale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('customer.payment.store',['customer_id'=>$customer->id]) }}" method="post">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> New Payment </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
          <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
            <div class="col-sm-9">
            <input type="date" class="form-control" name="date" placeholder='date'>
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="amount" placeholder='Amount'>
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


