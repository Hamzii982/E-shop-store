
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Cart</li>
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
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php
                                            $i=0;
                                            foreach($cart as $item)
                                            {
                                                // $rowid[$i]=$item['rowid'];
                                                // echo "<input type='hidden' class='rowid' value=".$rowid[$i]."";
                                                // print_r($rowid[$i]);
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <?php
                                                        foreach($item['options'] as $img)
                                                        {
                                                    ?>
                                                    <a href="<?=base_url('product-details?id='.$item['id'])?>"><img src="<?=$img?>" alt="Image"></a>
                                                    <?php
                                                        }
                                                    ?>
                                                    <p><?=$item['name']?></p>
                                                </div>
                                            </td>
                                            <td>$<?=$item['price']?></td>
                                            <td>
                                                <div class="qty">
                                                    <input type='hidden' class='rowid' value="<?=$item['rowid']?>">
                                                    <input type="number" class='form-control itemqty' value="<?=$item['qty']?>" style="width:100px;">
                                                </div>
                                            </td>
                                            <td>$<?php echo $item['subtotal'] ?></td>
                                            <td><a class='btn' href="<?=base_url('removeitem?id='.$item['id'].'&rowid='.$item['rowid'].'')?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <!-- <div class="col-md-12">
                                    <div class="coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button>Apply Code</button>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span>$<?=$this->cart->total()?></span></p>
                                            <p>Shipping Cost<span>$0</span></p>
                                            <h2>Grand Total<span>$<?=$this->cart->total()?></span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="<?=base_url('product-list')?>" class='btn update'>Update Cart</a>
                                            <a href="<?=base_url('checkout')?>" class='btn'>Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->