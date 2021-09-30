<div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <h4 class="page-title text-uppercase font-medium font-14">Add New Payment Method</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                <div class="d-md-flex">
                                        <ol class="breadcrumb ml-auto">
                                                <li><a href="#">Dashboard</a></li>
                                        </ol>
                                </div>
                        </div>
                </div>
                                <!-- /.col-lg-12 -->
        </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        <div class="container-fluid">
                <!--Show Pages-->
        <div class="row">
                <div class="col-md-12">
                        <div class="card" >
                                <div class="card-body">
                                        <h3 class="card-title text-uppercase font-medium font-18">Add New Payment Type</h3><hr>
                                        <form method='post' class="form-horizontal form-material" action="<?=base_url('PaymentController/record')?>">
                                                <div class="form-group mb-4">
                                                        <h4>AccountHolder Name:</h4>
                                                        <input type='text' class="form-control p-0 border-0" name='acname'  placeholder='Add Account Holder Name...'><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>Bank Name:</h4>
                                                        <input type='text' name='bname' class="form-control p-0 border-0" placeholder='Add Bank Name...'><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>Branch Code:</h4>
                                                        <input type='number' name='code' class="form-control p-0 border-0" placeholder='Add Branch Code..'><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>Branch Location:</h4>
                                                        <input type='text' name='address' class="form-control p-0 border-0" placeholder='Add Branch Location..'><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>Account No.:</h4>
                                                        <input type='number' name='acn' class="form-control p-0 border-0" placeholder='Add Account Number..'><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>IBN No.:</h4>
                                                        <input type='text' name='ibn' class="form-control p-0 border-0" placeholder='Add IBAN Number..'><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <input type='submit' class="btn btn-primary" name='Submit' value='Submit'>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>