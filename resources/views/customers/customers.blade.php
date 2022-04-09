 @extends('layout.app')

@section('tittle','Customers')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Customers List </h3>	
	</div>
	<div class="col-md-6 text-right">
		<a href="{{ url('customers/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Customers </a>
	</div>
    <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Actions</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Maherab</td>
                                            <td>01799483838</td>
                                            <td class="text-center">
                                                <a href="{{ url('customers/3') }}" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                                                <a href="{{ url('customers/1/edit') }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit" ></i></a>
                                                <button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                                              </td>
                                        </tr>
                                           <tr>
                                            <td>1</td>
                                            <td>Maherab</td>
                                            <td>01799483838</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>
                                                <a href="#" class="btn btn-primary btn-sm"> <i class="fa fa-edit" ></i></a>
                                                <button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                                              </td>
                                        </tr>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop