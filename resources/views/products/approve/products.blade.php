@extends('layout.app')

@section('tittle','Product')

@section('content')
<div class="row clearfix mb-4">
    
	<div class="col-md-6">
	<h3>Inapprove Product List </h3>	
	</div>

  
   
    <div class="container-fluid">
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Supplier</th> 
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Quantity</th> 
                                            <th>Supplier</th> 
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                           @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{ $product->supplier->name }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('approve.product',['item_id'=>$product->id]) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-check" ></i></button>
                                                   
                                                    <a onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-times"></i> </a>
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



@stop

