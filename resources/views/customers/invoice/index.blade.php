@extends('layout.app')

@section('tittle','Customer')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Customer Invoice</h3>	
	</div>
	<div class="col-md-6 text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_sale">
		<!-- <a href="{{ url('invoice/create') }}" class="btn btn-primary">  -->
            <i class="fa fa-plus">

        </i> Add Invoice </a>
	</div>
</div>

<div class="row clearfix">
	<div class="col-md-2">
    <div class="nav flex-column nav-pills" >
    <a href="{{url('customers',$customer->id)}}" class="btn btn-primary text-left">Customer Information</a>
	<a href="{{ route('customerInvoice.show',$customer->id) }}" class="btn btn-secondary mt-1 text-left">Invoice</a>
	<a href="{{ route('customerPayment.show',$customer->id) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('customerRefund.show',$customer->id) }}" class="btn btn-primary mt-1 text-left">Refund</a>
</div>


    </div>
    
    <div class="col-md-9">
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
    	<!-- DataTales Example -->
        <div class="card shadow mb-4">

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Actions</th>


                </tr>
            </tfoot>
            <tbody>
                @foreach ($customer->customer_invoice as $invoice)
                <tr>
                  <td>{{ $invoice->id }}</td>
           
                  <td>{{$invoice->date}}</td>
                  <td>{{$invoice->description}}</td>
                  <td class="text-center">
                    <form action="{{ route('customer.invoice.delete',['invoice_id'=>$invoice->id,'customer_id'=>$customer->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <a href="{{ route('customer.invoice.details',['invoice_id'=>$invoice->id,'customer_id'=>$customer->id]) }}" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                      
                      <button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                    </td>
                  </form>
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
    <form action="{{ route('customer.invoice.store',$customer->id) }}" method="post">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPaymentModalLabel"> New Invoice </h5>
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
          <label for="note" class="col-sm-3 col-form-label">Short Note </label>
          <div class="col-sm-9">
            <textarea name="description" placeholder='note' class='form-control' id="" cols="10" rows="10"></textarea>
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


