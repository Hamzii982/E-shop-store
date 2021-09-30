<!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
          <div class="container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sellers</a></li>
              <li class="breadcrumb-item active">Login & Register</li>
            </ul>
          </div>
        </div>
        <!-- Breadcrumb End -->
        <?php if($responce = $this->session->userdata('success')){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <?php echo $responce;?>
                    </div>
                    <?=$this->session->unset_userdata('success')?>
                </div>
            </div>
        <?php }
        elseif($responce = $this->session->userdata('error')){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <?php echo $responce;?>
                    </div>
                    <?=$this->session->unset_userdata('error')?>
                </div>
            </div> 
            <?php
            }
            ?>
        <div class="login">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="row" id="show-register">
                  <div class="col-md-12">
                    <h2>Want to Register Yourself as a Seller?<h2><br>    
                    <button class="btn btn-primary" onclick="register()">Seller Register</button>
                  </div>
                </div>
                <div class="register-form" id='register-form' style="display:none;">
                  <form method='post' action="<?=base_url('LoginController/insertuser');?>">
                  <div class="row">
                    <div class="col-md-12">
                      <label style="color:red;">Fields with ( * ) are required.</label>
                    </div><br><br>
                    <div class="col-md-6">
                      <label>First Name *</label>
                      <input class="form-control" name="fname" type="text" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                      <label>Last Name *</label>
                      <input class="form-control" name="lname" type="text" placeholder="Last Name" required>
                    </div>
                    <div class="col-md-6">
                      <label>Email *</label>
                      <input type='text' class="form-control" name='email'  placeholder='Enter your Email' required><br>
                    </div>
                    <div class="col-md-6">
                      <label>Country *</label>
                      <select class="custom-select country" name='country' id='country' required>
                      <option value='' disabled selected>Select Country</option>
                        <?php
                          foreach($countries as $country)
                          {                                                                 
                            echo "<option value='".$country->countryName."'>".$country->countryName."</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label>State *</label>
                        <select class="custom-select state" name='state' id='state' required>
                          <option value='' disabled selected>Select State</option>
                                            <!-- Select Country First-->
                        </select>
                            <!-- <input class="form-control" type="text" placeholder="State"> -->
                    </div>
                    <div class="col-md-6">
                      <label>City</label>
                      <select class="custom-select" name='city' id='city'>
                        <option value='' disabled selected>Select City</option>
                          <!-- Select Country First-->
                      </select>
                        <!-- <input class="form-control" type="text" placeholder="City"> -->
                    </div>
                    <div class="col-md-12">
                      <label>Address *</label>
                      <input class="form-control" name="address" type="text" placeholder="Address">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-3">
                          <label>C-Code</label>
                          <select class="custom-select phone" name='phonecode' id="phone1">
                            <option value='' disabled selected>-</option>
                            <?php
                              foreach($countries as $country)
                              { 
                                echo "<option value='+".$country->phoneCode."'>+".$country->phoneCode."</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-9">
                          <label>Mobile No *</label>
                          <input class="form-control" name="mobile" type="text" placeholder="Mobile No(3XXXXXXXXX)" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>ZIP Code</label>
                      <input class="form-control" type="text" name="zip" placeholder="ZIP Code">
                    </div>
                    <div class="col-md-6">
                      <label>Password *</label>
                      <input type='password' class="form-control" name='Password' placeholder='Password' required><br>
                    </div>
                    <div class="col-md-6">
                      <label>Confirm Password *</label>
                      <input type='password' class="form-control" name='cPassword' placeholder='Confirm Password' required><br>
                    </div>
                    <div class="col-md-12">
                      <input type='checkbox' class="btn" name='check' value='Human' required><span style="font-size:16px;">&nbsp&nbsp I'm not a Robot</span>
                    </div>
                    <div class="col-md-12" style="padding-top:30px;">
                      <input type='submit' class="btn btn-primary" name='Submit' value='Register'>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row" id="show-login" style="display:none;">
                  <div class="col-md-12">
                    <h2>Already Have a Seller Account?<h2><br>    
                    <button class="btn btn-secondary" onclick="login()">Seller Login</button>
                  </div>
                </div>
                <div class="login-form" id="login-form">
                  <form method='post' action="<?=base_url('LoginController/getuser');?>">
                    <div class="row">
                      <div class="col-md-6">
                        <label>E-mail </label>
                        <input type='text' class="form-control" name='Email'  placeholder='Enter your Email' required><br>
                      </div>
                      <div class="col-md-6">
                        <label>Password</label>
                        <input type='password' class="form-control" name='Password' placeholder='Enter your Password' required><br>
                      </div>
                      <div class="col-md-12">
                        <input type='submit' class="btn btn-primary" name='Submit' value='Login'>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
