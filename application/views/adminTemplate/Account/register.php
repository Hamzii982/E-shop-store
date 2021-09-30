
  <div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title text-uppercase font-medium font-14">Register New Admin</h4>
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
              <h3 class="card-title text-uppercase font-medium font-18">Registration Form</h3><hr>
              <form method='post' class="form-horizontal form-material" action="<?=base_url('accountController/insertuser');?>">
                <div class="form-group mb-4">
                  <h5 style='text-align:left;'>Username:</h5>
                  <input type='text' class="form-control p-0 border-0" name='User'  placeholder='Enter your Username' required><br>
                </div>
                <div class="form-group mb-4">
                  <h5 style='text-align:left;'>Email:</h5>
                  <input type='text' class="form-control p-0 border-0" name='Email'  placeholder='Enter your Email' required><br>
                </div>
                <div class="form-group mb-4">
                  <h5 style='text-align:left;'>Password:</h5>
                  <input type='password' class="form-control p-0 border-0" name='Password' placeholder='Enter your Password' required><br>
                </div>
                <div class="form-group mb-4">
                  <h5 style='text-align:left;'>Confirm Password:</h5>
                  <input type='password' class="form-control p-0 border-0" name='cPassword' placeholder='Confirm your Password' required><br>
                </div>
                <div class="form-group mb-4">
                  <input type='checkbox' class="btn btn-primary" name='check' value='Human' required><span style="font-size:16px;">&nbsp&nbsp I'm not a Robot</span>
                </div>
                <div class="form-group mb-4">
                  <input type='submit' class="btn btn-primary" name='Submit' value='Register'>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>