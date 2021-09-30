         
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
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
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid">
                <form method="post" action="<?=base_url('placeorder')?>"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Shipping Address</h2>
                                <?php
                                    foreach($result as $row)
                                    {
                                ?>
                                <input name="cid" type="hidden" placeholder="First Name" value="<?=$row->Id?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" name="fname" type="text" placeholder="First Name" value="<?=$row->FirstName?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" name="lname" type="text" placeholder="Last Name" value="<?=$row->LastName?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" type="text" placeholder="E-mail" value="<?=$row->Email?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" name="mobile" type="text" placeholder="Mobile No" value="<?=$row->Mobile?>">
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label>Country</label>
                                        <select class="custom-select" name="country">
                                            <?php
                                                // foreach($countries as $country)
                                                // {                              
                                                //     if($row->country==$country->countryName)
                                                //     {
                                                //         echo "<option value='".$country->countryName."' selected>".$country->countryName."</option>";    
                                                //     }
                                                //     else
                                                //     {                                   
                                                //         echo "<option value='".$country->countryName."'>".$country->countryName."</option>";
                                                //     }
                                                // }
                                            ?>
                                        </select>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" name="city" type="text" placeholder="City" value="<?=$row->city?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" name="state" type="text" placeholder="State" value="<?=$row->state?>">
                                    </div> -->
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" name="address" type="text" placeholder="Address" value="<?=$row->Address?>">
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" name="zip" type="text" placeholder="ZIP Code" value="">
                                    </div> -->
                                    <!-- <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto">Ship to different address</label>
                                        </div>
                                    </div> -->
                                </div>
                                <?php
                                    }
                                ?>
                            </div>

                            <!-- <div class="shipping-address">
                                <h2>Shipping Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Cart Total</h1>
                                <!-- <p>Product Name<span>$99</span></p> -->
                                <p class="sub-total">Sub Total<span>$<?=$this->cart->total()?></span></p>
                                <p class="ship-cost">Shipping Cost<span>$0</span></p>
                                <h2>Grand Total<span>$<?=$this->cart->total()?></span></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <!-- <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Check Payment</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div> -->
                                    <div class="payment-method">
                                            <?php
                                                if(!$this->session->userdata('paid'))
                                                {

                                            ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment" value="Card Payment" required>
                                            <label class="custom-control-label" for="payment-4">Card Payment</label>
                                        </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment" value="Card Payment" checked='checked' required>
                                            <label class="custom-control-label" for="payment-4">Card Payment</label>
                                        </div>
                                        <?php
                                                }
                                        ?>
                                        <div class="payment-content" id="payment-4-show">
                                           
                                            <?php

                                                if(!$this->session->userdata('paid'))
                                                {

                                            ?>
                                            <p>
                                                Pay through bank Card <a class='btn' href='<?=base_url('payment')?>'>Here</a>

                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                             <p>
                                                Amount has been <strong>Paid</strong>.
                                            </p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                            <?php

                                                
                                                if(!$this->session->userdata('paid'))
                                                {

                                            ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment" value="On Delivery Payment" required>
                                            <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                        </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment" value="On Delivery Payment" required disabled>
                                            <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                        </div>
                                            <?php
                                                }
                                            ?>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Payment will be Charged when the product is delivered.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <input type="submit" class="btn" name="submit" value="Place Order">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Checkout End -->
