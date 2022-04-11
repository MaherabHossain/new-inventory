@extends('layout.app')

@section('tittle','Brand')

@section('content')
<div class="row clearfix mb-4">
    
	<div class="col-md-6">
	<h3>Brand List </h3>	
	</div>
	<div class="col-md-6 text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_sale">
		<!-- <a href="{{ url('invoice/create') }}" class="btn btn-primary">  -->
            <i class="fa fa-plus">
        </i> Add Brand </a>
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                           @foreach ($brands as $brand)
                                           <tr>
                                            <td>{{$brand->id}}</td>
                                            <td>{{$brand->brand_name}}</td>
                                            <td class="text-center">
                                                <form action="{{url('brand/'.$brand->id.'/delete')}}" method="post">
                                                <a href="{{url('brand/'.$brand->id.'/edit')}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit" ></i></a>
                                                    @csrf
                                                   
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
    <form action="{{ url('brand') }}" method="post">
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
            <label for="amount" class="col-sm-3 col-form-label">Brand Name <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
                <input type="text" name='brand_name' class="form-control" placeholder='Name'>
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
