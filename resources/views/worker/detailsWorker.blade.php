@extends('layout.app')

@section('tittle','Worker')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Customer Information</h3>	
	</div>
	<div class="col-md-8 text-right">

	</div>
</div>

<div class="row clearfix">
    <div class="col-md-9">
    	<div class="card shadow mb-4">
            <div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary"> {{ $worker->name }} </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md-center">
			    		<div class="col-md-8">
			    			<table class="table table-borderless table-striped">
					      
					      	<tr>
					      		<th class="text-right">Name : </th>
					      		<td>{{ $worker->name }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">QID Number : </th>
					      		<td> {{ $worker->q_id }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">QID Expiry : </th>
					      		<td>{{ $worker->q_id_Exp }}</td>
					      	</tr>
							  <tr>
					      		<th class="text-right">PP Number : </th>
					      		<td>{{ $worker->pp }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">PP Expiry : </th>
					      		<td> {{ $worker->pp_exp }} </td>
					      	</tr>
							<tr>
					      		<th class="text-right">PP Image : </th>
					      		<td><img src="{{ asset('/worker/PPimg/'.$worker->pp_img) }}" style="height:80px;width:80px;"></td> 
					      	</tr> 
					      	<tr>
					      		<th class="text-right">QID Image : </th>
					      		<td><img src="{{ asset('/worker/QidImg/'.$worker->q_id_img) }}" style="height:80px;width:80px;"></td>
					      	</tr>               
					      	<tr>
					      		<th class="text-right">User Image : </th>
					      		<td><img src="{{ asset('/worker/userImg/'.$worker->user_img) }}" style="height:80px;width:80px;"></td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Service : </th>
					      		<td>{{ $worker->service }}</td>
					      	</tr>
							  <tr>
					      		<th class="text-right">Total Amount : </th>
					      		<td>{{ $worker->amount }}</td>
					      	</tr>
							  <tr>
					      		<th class="text-right">Paid : </th>
					      		<td>{{ $worker->payment->paid }}</td>
					      	</tr>
							  <tr>
								  <?php 
								 	$pay = $worker->payment->paid;
									 $totalAmount = $worker->amount;
									 $due= $pay-$totalAmount;  
								  ?>
					      		<th class="text-right">Due : </th>
					      		<td>{{ $due }}</td>
					      	</tr>
							  <tr>
					      		<th class="text-right">Remark : </th>
					      		<td>{{ $worker->remark }}</td>
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