@extends('layout.app')

@section('tittle','Customer')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Customer Payment</h3>	
	</div>
	
</div>

<div class="row clearfix">
	<div class="col-md-2">
    <div class="nav flex-column nav-pills" >
	<a href="{{url('customer/'.$customer->id)}}" class="btn btn-primary text-left">Customer Information</a>
	<a href="{{ route('customerInvoice.show',$customer->id) }}" class="btn btn-primary mt-1 text-left">Invoice</a>
	<a href="{{ route('customerPayment.show',$customer->id) }}" class="btn btn-secondary mt-1 text-left">Payment</a>
	<a href="{{ route('customerRefund.show',$customer->id) }}" class="btn btn-primary mt-1 text-left">Refund</a>
</div>


    </div>
    
    <div class="col-md-9">
    	<!-- DataTales Example -->
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
  <a href="{{ route('customerPayment.show',['customer_id'=>$customer->id]) }}" class="btn btn-primary mb-2"> <i class="fa fa-arrow-left"></i> Back </a>
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Payment Details </h6>
              </div>
              <div class="card-body">
                <h4> Supplier name : {{ $customer->name }}</h4>	
                  <div class="row clearfix justify-content-md-center">
                      <div class="col-md-8">
                          <table class="table table-borderless table-striped">
                        
                            <tr>
                                <th class="text-right">Amount : </th>
                                <td>{{$payment->amount}} </td>
                            </tr>
                            <tr>
                                <th class="text-right">Date : </th>
                                <td> {{$payment->date}} </td>
                            </tr>
                            <tr>
                                <th class="text-right">Note : </th>
                                <td> {{$payment->note}} </td>
                            </tr>
                            <tr>
                                <th class="text-right">Type : </th>
                                <td> <?php if(isset($payment->customer_invoice_id)){
                                    echo "Invoice Payment";
                                }else{
                                    echo "Payment";
                                }?> </td>
                            </tr>
                           </table>
                      </div>
                  </div>
              </div>
            
</div>
    </div>
</div>
@stop
