 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                    <li class="breadcrumb-item active">Payment</li>
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

        <?php
            // $this->session->unset_userdata('paid');
            if($this->session->userdata('paid'))
            {
        ?>
        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Amount has been Paid.<h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist End -->
        <?php
            }
            else
            {
        ?>
        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Please provide your credentials to proceed to checkout:<h3><br>
                            <form method='post' action='<?=base_url('cardpay')?>'>
                            <?php
                                require('assets/config.php');
                            ?>

                                <script

                                    src="https://checkout.stripe.com/checkout.js";
                                    class="stripe-button";
                                    data-key="<?php echo $Publishablekey; ?>";
                                    data-amount='<?=$this->cart->total()*100?>';
                                    data-name="Estore Checkout";
                                    data-description="E-Store is No.1 Selling E-Commerce Store";
                                    data-image="";
                                    data-currency="usd";
                                >
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist End -->
        <?php
            }
        ?>