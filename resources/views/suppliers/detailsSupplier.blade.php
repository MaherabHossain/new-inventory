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
	<a href="{{url('suppliers/3')}}" class="btn btn-secondary text-left">Supplier Information</a>
	<a href="{{ route('supplierInvoice.show',3) }}" class="btn btn-primary mt-1 text-left">Invoice</a>
	<a href="{{ route('supplierPayment.show',3) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('supplierRefund.show',3) }}" class="btn btn-primary mt-1 text-left">Refund</a>
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
					      		<td>Maherab </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Eamil : </th>
					      		<td> maherabzishan.cs@gmail.com </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Phone : </th>
					      		<td> 01793847289</td>
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