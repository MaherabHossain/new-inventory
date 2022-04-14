@extends('layout.app')

@section('tittle','Customer')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Supplier Information</h3>	
	</div>
	<div class="col-md-8 text-right">

	</div>
</div>


<div class="row clearfix">
	<div class="col-md-2">
    <div class="nav flex-column nav-pills" >
	<a href="{{url('supplier/'.$supplier->id)}}" class="btn btn-secondary text-left">Supplier Information</a>
	<a href="{{ route('supplierInvoice.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Invoice</a>
	<a href="{{ route('supplierPayment.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('supplierRefund.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Refund</a>
</div>
    </div>
    <div class="col-md-9">
    	<div class="card shadow mb-4">
            <div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary"> Maherab </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md-center">
			    		<div class="col-md-8">
			    			<table class="table table-borderless table-striped">
					      
					      	<tr>
					      		<th class="text-right">Name : </th>
					      		<td>{{$supplier->name}} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Eamil : </th>
					      		<td> {{$supplier->email}} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Phone : </th>
					      		<td> {{$supplier->phone}}</td>
					      	</tr>
						     </table>
			    		</div>
			    	</div>
			    </div>
			  </div>                 
		</div>
    </div>
</div>
@stop