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
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('home')?>"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?filter=selling')?>"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?filter=new')?>"><i class="fa fa-plus-square"></i>New Arrivals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?category=13')?>"><i class="fa fa-female"></i>New in Grocery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?category=3')?>"><i class="fa fa-child"></i>New in Shoes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?category=8')?>"><i class="fa fa-tshirt"></i>New in Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?category=10')?>"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url('product-list?category=7')?>"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <?php
                                foreach($products as $product)
                                {
                                    if($product->featured==1)
                                    {
                            ?>
                            <div class="header-slider-item">
                                <img style='height:400px; width:600px;' src="<?=$product->Image?>" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p><?=$product->Name?></p>
                                    <a class="btn" href="<?=base_url('buynow?id='.$product->Id)?>"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="/eshop/assets/customerContent/img/category-1.jpg" />
                                <a class="img-text" href="<?=base_url('product-list?category=13')?>">
                                    <p>Interested in Fashion and designs checkout our vast variety.</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="/eshop/assets/customerContent/img/category-2.jpg" />
                                <a class="img-text" href="<?=base_url('product-list?category=8')?>">
                                    <p>Interested in Clothing checkout our vast variety.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="/eshop/assets/customerContent/img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="/eshop/assets/customerContent/img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="/eshop/assets/customerContent/img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="/eshop/assets/customerContent/img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="/eshop/assets/customerContent/img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="/eshop/assets/customerContent/img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->      
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                                Payments through Cards and Cash on delivery Securely
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Nationwide Delivery</h2>
                            <p>
                                Fast & Quick delivery at your doorstep 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                                We provide Quality products with 100% moneyback guarantee
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                                Our Customer Support desk works 24/7 for your help and queries
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <?php
                        $i=0;
                        foreach($products as $product)
                        {
                            if($i<4)
                            {
                    ?>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="<?=$product->Image?>" />
                            <?php
                                foreach($category as $cat)
                                {
                                    if($cat->Id==$product->Category)
                                    {
                            ?>
                            <a class="category-name" href="<?=base_url('product-list?category='.$cat->Id)?>">
                                <p>
                                        <?=$cat->Name?>
                                </p>
                            </a>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                            $i++;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+92-336-5131959</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php
                        foreach($products as $product)
                        {
                            if($product->featured==1)
                            {
                    ?>
                    <div class="col-lg-3 ">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="<?=base_url('product-details?id='.$product->Id)?>"><?=$product->Name?></a>
                                <div class="ratting">
                                    <?php
                                        $i=1; 
                                        $result=0; 
                                        $j=0;
                                        $k=0;
                                        foreach($reviews as $review)
                                        {
                                            if($review->product_id==$product->Id)
                                            {
                                                $result=$review->stars+$result;
                                                $j=$i;
                                                $i++;
                                            }
                                        }
                                        if($j!=0)
                                        {
                                            $star=$result/$j;
                                        }
                                        else
                                        {
                                            $star=0;
                                        }
                                        while($k<$star)
                                        {
                                    ?>
                                    <i class="fa fa-star"></i>
                                    <?php
                                            $k++;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="<?=base_url('product-details?id='.$product->Id)?>">
                                    <img style="height:350px;" src="<?=$product->Image?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="<?=base_url('addtocart?id='.$product->Id)?>"><i class="fa fa-cart-plus"></i></a>
                                    <a href="<?=base_url('addtowishlist?id='.$product->Id)?>"><i class="fa fa-heart"></i></a>
                                    <a href="<?=base_url('product-details?id='.$product->Id)?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span><?=$product->SalePrice?></h3>
                                <a class="btn" href="<?=base_url('buynow?id='.$product->Id)?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                        <?php
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Subscribe Our Newsletter</h1>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="<?=base_url('newsletter')?>">
                        <div class="form">
                            <input type="email" name='email' placeholder="Your email here">
                            <button>Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->        
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Recent Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php
                        $j=0;
                        foreach($newprods as $newprod)
                        {
                            if($j<15)
                            {
                    ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="<?=base_url('product-details?id='.$newprod->Id)?>"><?=$newprod->Name?></a>
                                <div class="ratting">
                                    <?php
                                        $i=1; 
                                        $result=0; 
                                        $j=0;
                                        $k=0;
                                        foreach($reviews as $review)
                                        {
                                            if($review->product_id==$newprod->Id)
                                            {
                                                $result=$review->stars+$result;
                                                $j=$i;
                                                $i++;
                                            }
                                        }
                                        if($j!=0)
                                        {
                                            $star=$result/$j;
                                        }
                                        else
                                        {
                                            $star=0;
                                        }
                                        while($k<$star)
                                        {
                                    ?>
                                    <i class="fa fa-star"></i>
                                    <?php
                                            $k++;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="<?=base_url('product-details?id='.$newprod->Id)?>">
                                    <img style="height:350px;" src="<?=$newprod->Image?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="<?=base_url('addtocart?id='.$newprod->Id)?>"><i class="fa fa-cart-plus"></i></a>
                                    <a href="<?=base_url('addtowishlist?id='.$newprod->Id)?>"><i class="fa fa-heart"></i></a>
                                    <a href="<?=base_url('product-details?id='.$newprod->Id)?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span><?=$newprod->SalePrice?></h3>
                                <a class="btn" href="<?=base_url('buynow?id='.$newprod->Id)?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            $j++;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <?php
                        foreach($reviews as $review)
                        {
                    ?>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="/eshop/assets/customerContent/img/propic.png" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2><?=$review->name?></h2>
                                <h3>Product: 
                                    <?php
                                        foreach($products as $product)
                                        {
                                            if($product->Id==$review->product_id)
                                            {
                                            ?>
                                                <a href="<?=base_url('product-details?id='.$product->Id)?>"><?=$product->Name?></a>
                                            <?php
                                            }
                                        }
                                    ?>
                                </h3>
                                <div class="ratting">
                                    <?php
                                        $i=1; 
                                        $result=0; 
                                        $j=0;
                                        $k=0;
                                        foreach($products as $product)
                                        {
                                            if($review->product_id==$product->Id)
                                            {
                                                $result=$review->stars+$result;
                                                $j=$i;
                                                $i++;
                                            }
                                        }
                                        if($j!=0)
                                        {
                                            $star=$result/$j;
                                        }
                                        else
                                        {
                                            $star=0;
                                        }
                                        while($k<$star)
                                        {
                                    ?>
                                    <i class="fa fa-star"></i>
                                    <?php
                                            $k++;
                                        }
                                    ?>
                                </div>
                                <p style="height:70px; overflow:hidden;">
                                    <?=$review->review?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Review End -->        