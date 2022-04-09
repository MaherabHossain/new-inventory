@extends('layout.app')

@section('tittle','Customer')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Customer Information</h3>	
	</div>
	<div class="col-md-8 text-right">

	</div>
</div>
<div class="row">
   <div class="col-xl-3 col-md-6 mb-4">
	    <div class="card border-left-success shadow h-100 py-2">
	        <div class="card-body">
	            <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
	                        Total Sale</div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	8000	
	                    </div>
	                </div>
	                <div class="col-auto">
	                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	   <div class="col-xl-3 col-md-6 mb-4">
	    <div class="card border-left-primary shadow h-100 py-2">
	        <div class="card-body">
	            <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                        Total Parchase</div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	900
                            </div>
	                </div>
	                <div class="col-auto">
	                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	   <div class="col-xl-3 col-md-6 mb-4">
	    <div class="card border-left-info shadow h-100 py-2">
	        <div class="card-body">
	            <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
	                        Total Receipts</div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">34534</div>
	                    
	                </div>
	                <div class="col-auto">
	                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	   <div class="col-xl-3 col-md-6 mb-4">
	    <div class="card border-left-secondary  shadow h-100 py-2">
	        <div class="card-body">
	            <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                    <div class="text-xs font-weight-bold text-secondary  text-uppercase mb-1">
	                        Total Payment</div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">6000</div>
	                   
	                </div>
	                <div class="col-auto">
	                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
	    <div class="card border-left-success shadow h-100 py-2">
	        <div class="card-body">
	            <div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
	                        Balance </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	9888
	                    </div>
	                </div>
	                <div class="col-auto">
	                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<div class="row clearfix">
	<div class="col-md-2">
    <div class="nav flex-column nav-pills" >
	<a href="{{url('customers/3')}}" class="btn btn-secondary text-left">Customer Information</a>
	<a href="{{ route('customerInvoice.show',3) }}" class="btn btn-primary mt-1 text-left">Invoice</a>
	<a href="{{ route('customerPayment.show',3) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('customerRefund.show',3) }}" class="btn btn-primary mt-1 text-left">Refund</a>
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