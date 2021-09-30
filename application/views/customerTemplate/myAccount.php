        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">My Account</li>
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
        
        <!-- My Account Start -->
        <?php
        foreach($result as $row)
        {
        ?>
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>address</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" href="<?=base_url('customer/logincontroller/logout')?>"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4>
                                <p>
                                    <?=$row->About?>
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Order No</th>
                                                <th>Products</th>
                                                <th>Date</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i=1;
                                            foreach($orders as $order)
                                            {
                                        ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?php
                                                foreach($details as $detail)
                                                {
                                                    foreach($detail as $det)
                                                    {
                                                        if($det->order_fid==$order->id)
                                                        {
                                                            $j=0;
                                                            $already=array('0');
                                                            foreach($products as $product)
                                                            {
                                                                foreach($product as $pro)
                                                                {
                                                                    // print_r($pro);
                                                                    foreach($pro as $prod)
                                                                    {
                                                                        if(is_array($prod) || is_object($prod))
                                                                        {
                                                                            if($det->order_fid==$order->id && $det->product_id==$prod->Id)
                                                                            {
                                                                                foreach($already as $ready)
                                                                                {
                                                                                    if($ready!=$prod->Id)
                                                                                    {
                                                                                        // print_r($ready);
                                                                                        echo $prod->Name;
                                                                                        echo "(".$det->quantity.")";
                                                                                        echo "<br>";
                                                                                        $already[$j]=$prod->Id;
                                                                                        $j++;
                                                                                    }
                                                                                }
                                                                                // echo "Hi";
                                                                                // print_r($prod->Id);
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>    
                                                </td>
                                                <td><?=$order->date?></td>
                                                <td><?=$order->total_amount?></td>
                                                <td><?=$order->status?></td>
                                                <?php
                                                    if($order->status=='pending')
                                                    {
                                                ?>
                                                <td><a href="<?=base_url('CustomerController/deleteorder?id='.$order->id)?>" class="btn">Cancel Order</a></td>
                                                <?php
                                                    }
                                                    elseif($order->status=='done')
                                                    {
                                                ?>
                                                <td><a href="<?=base_url('CustomerController/removeorder?id='.$order->id)?>" class="btn">Remove Order</a></td>
                                                <?php
                                                    }
                                                    else
                                                    {

                                                ?>
                                                <td><a href="<?=base_url('CustomerController/recieveorder?id='.$order->id)?>" class="btn">Order Recieved</a></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                        <?php
                                                $i++;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Payment Address</h5>
                                        <p><?php echo $row->Address;?></p>
                                        <p>Mobile: <?php echo $row->Mobile;?></p>
                                        <button class="btn">Edit Address</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Shipping Address</h5>
                                        <p><?php echo $row->Address;?></p>
                                        <p>Mobile: <?php echo $row->Mobile;?></p>
                                        <button class="btn">Edit Address</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <form method="post" action="<?=base_url('editprofile?id='.$row->Id)?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" name="fname" type="text" placeholder="First Name" value="<?=$row->FirstName?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="lname" type="text" placeholder="Last Name" value="<?=$row->LastName?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="mobile" type="text" placeholder="Mobile" value="<?=$row->Mobile?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="email" type="text" placeholder="Email" value="<?=$row->Email?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="address" type="text" placeholder="Address" value="<?=$row->Address?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input type='submit' name="submit" value="Update Account" class="btn">
                                        <br><br>
                                    </div>
                                </div>
                                </form>
                                <h4>Password change</h4>
                                <form method="post" action="<?=base_url('editcredential?id='.$row->Id)?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="curpass" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="pass" type="password" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="cpass" type="password" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Save Changes" name="submit" class="btn">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- My Account End -->
        