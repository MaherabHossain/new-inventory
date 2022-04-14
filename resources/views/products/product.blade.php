@extends('layout.app')

@section('tittle','Product')

@section('content')
<div class="row clearfix mb-4">
    
	<div class="col-md-6">
	<h3>Product List </h3>	
	</div>
	<div class="col-md-6 text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_sale">
		<!-- <a href="{{ url('invoice/create') }}" class="btn btn-primary">  -->
            <i class="fa fa-plus">
        </i> Add Product </a>
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
                                            <th>Brand</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Brand</th>
                                            <th>Name</th>  
                                            <th>Stock</th>                                      
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                           @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->brand->brand_name}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td class="text-center">
                                                <form action="{{url('product/'.$product->id)}}" method="post">
                                                <a href="{{url('product/'.$product->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                                                <a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit" ></i></a>
                                                    @csrf
                                                   @method('delete')
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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


<div class="modal fade" id="add_sale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ url('product') }}" method="post">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">  
            <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span>  </label>
                <div class="col-sm-9">
                    <input type="text" name='product_name' class="form-control" placeholder='Name'>
                </div>
              </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Brand Name <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
                <select class="form-control" name='brand_id'>
                    <option selected value="" > Select Brand </option>
                   @foreach ($brands as $brand)
                       <option value="{{$brand->id}}"> {{$brand->brand_name}} </option>
                   @endforeach
                  </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Product Description </label>
            <div class="col-sm-9">
                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Description"></textarea>
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
