
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Account Edit</h4>
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
                                <h3 class="card-title text-uppercase font-medium font-18">Update User</h3><hr>
                                <?php
                                    foreach($result as $row)
                                    {
                                ?>
                                <form method='post' action="<?=base_url('AccountController/Edit')?>">
                                    <input type='hidden' class="form-horizontal form-material" name='id' value='<?=$row->Id?>'>
                                    <div class="form-group mb-4">
                                        <h4>User Name:</h4>
                                        <input type='text' name='name' class="form-control p-0 border-0" value='<?=$row->Username?>' placeholder='Page name'><br>
                                    </div>
                                    <div class="form-group mb-4">
                                        <h4>User Email:</h4>
                                        <input type='text' class="form-control p-0 border-0" name='email' placeholder='User Email' value='<?=$row->Email?>'><br>
                                    </div>
                                    <div class="form-group mb-4">
                                        <h4>User Password:</h4>
                                        <input type='password' class="form-control p-0 border-0" name='pass' placeholder='Password' value='<?=$row->Password?>'><br>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type='submit' class="btn btn-primary" name='Submit' value='Submit'>  
                                    </div>

                                </form>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>