@extends('layout.app')

@section('tittle','Customer')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Supplier Refund</h3>	
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
	<a href="{{url('supplier/'.$supplier->id)}}" class="btn btn-primary text-left">Supplier Information</a>
	<a href="{{ route('supplierInvoice.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Invoice</a>
	<a href="{{ route('supplierPayment.show',$supplier->id) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('supplierRefund.show',$supplier->id) }}" class="btn btn-secondary mt-1 text-left">Refund</a>
</div>


    </div>
    
    <div class="col-md-9">
    	<!-- DataTales Example -->
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
                <tr>
                    <td>1</td>
                    <td>2-5-2020</td>
                    <td>5000</td>
                    <td>payment fot buy a brnad new car</td>
                    <td class="text-center">
                        <a href="{{ url('customers/3') }}" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                       
                        <button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                      </td>
                </tr>
                   <tr>
                   <td>1</td>
                    <td>2-5-2020</td>
                    <td>5000</td>
                    <td>payment fot buy a brnad new car</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                       
                        <button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                      </td>
                </tr>
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
    <form action="{{ route('invoice.store',4) }}" method="post">
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
            <input type="date" class="form-control" placeholder='date'>
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder='Amount'>
            </div>
          </div>

          <div class="form-group row">
            <label for="note" class="col-sm-3 col-form-label">Note </label>
            <div class="col-sm-9">
              <textarea name="" placeholder='note' class='form-control' id="" cols="10" rows="10"></textarea>
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


