@extends('layout.app')

@section('tittle','Payment')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Payment Information</h3>	
	</div>
	<div class="col-md-8 text-right">

	</div>
</div>

<div class="row clearfix">
    <div class="col-md-9">
    	<div class="card shadow mb-4">
            <div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary">Transition Id :  {{ $payment->trans_id }} </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md-center">
			    		<div class="col-md-8">
			    			<table class="table table-borderless table-striped">
					      
					      	<tr>
					      		<th class="text-right">Name : </th>
					      		<td>{{ $payment->name }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Paid : </th>
					      		<td> {{ $payment->paid }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Transition Id : </th>
					      		<td>{{ $payment->trans_id }}</td>
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