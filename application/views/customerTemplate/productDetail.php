 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
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
        
        <!-- Product Detail Start -->
        <?php
            foreach($products as $product)
            {
                $qty=1;
        ?>
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img style='height:400px;' src="<?=$product->Image?>" alt="Product Image">
                                        <!-- <img src="/eshop/assets/customerContent/img/product-3.jpg" alt="Product Image">
                                        <img src="/eshop/assets/customerContent/img/product-5.jpg" alt="Product Image">
                                        <img src="/eshop/assets/customerContent/img/product-7.jpg" alt="Product Image">
                                        <img src="/eshop/assets/customerContent/img/product-9.jpg" alt="Product Image">
                                        <img src="/eshop/assets/customerContent/img/product-10.jpg" alt="Product Image"> -->
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img style='height:60px;' src="<?=$product->Image?>" alt="Product Image"></div>
                                        <!-- <div class="slider-nav-img"><img src="/eshop/assets/customerContent/img/product-3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/eshop/assets/customerContent/img/product-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/eshop/assets/customerContent/img/product-7.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/eshop/assets/customerContent/img/product-9.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/eshop/assets/customerContent/img/product-10.jpg" alt="Product Image"></div> -->
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?=$product->Name?></h2></div>
                                        <div class="ratting">
                                            <?php
                                                $i=1; 
                                                $result=0; 
                                                $j=0;
                                                $k=0;
                                                foreach($reviews as $review)
                                                {
                                                    $result=$review->stars+$result;
                                                    $j=$i;
                                                    $i++;
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
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>$<?=$product->SalePrice?> </p>
                                            <!-- <p>$99 <span>$149</span></p> -->
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="<?=base_url('addtocart?id='.$product->Id)?>"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                            <a class="btn" href="<?=base_url('buynow?id='.$product->Id)?>"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (<?=$number?>)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            <?=$product->Description?> 
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Nothing to show.</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <?php
                                            foreach($reviews as $review)
                                            {
                                        ?>
                                        <div class="reviews-submitted">
                                            <div class="reviewer"><?=$review->name?> - <span><?=$review->date?></span></div>
                                            <div class="ratting">
                                                <?php
                                                    $i=0;
                                                    while($i<$review->stars)
                                                    {
                                                ?>
                                                <i class="fa fa-star"></i>
                                                <?php
                                                        $i++;
                                                    }
                                                ?>
                                            </div>
                                            <p>
                                                <?=$review->review?>
                                            </p>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <form method="post" action="<?=base_url('reviewsubmit?id='.$product->Id)?>">
                                            <div class="reviews-submit">
                                                <h4>Give your Review:</h4>
                                                <div class="row pb-2">
                                                    <div class="col-sm-2 pt-3">
                                                        <h6>Star Rating:</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="rate">
                                                            <input type="radio" id="rate5" name="rating" value="5" />
                                                            <label for="rate5" title="review">5 stars</label>
                                                            <input type="radio" id="rate4" name="rating" value="4" />
                                                            <label for="rate4" title="review">4 stars</label>
                                                            <input type="radio" id="rate3" name="rating" value="3" />
                                                            <label for="rate3" title="review">3 stars</label>
                                                            <input type="radio" id="rate2" name="rating" value="2" />
                                                            <label for="rate2" title="review">2 stars</label>
                                                            <input type="radio" id="rate1" name="rating" value="1" />
                                                            <label for="rate1" title="review">1 star</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" placeholder="Name">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" name="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <textarea name="review" placeholder="Review"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="submit" class="btn" value='Submit'>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                <?php
                                    foreach($related as $relate)
                                    {
                                ?>
                                <div class="col-lg-4 ">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="<?=base_url('product-details?id='.$relate->Id)?>"><?=$relate->Name?></a>
                                            <div class="ratting">
                                                <?php
                                                    $i=1; 
                                                    $result=0; 
                                                    $j=0;
                                                    $k=0;
                                                    foreach($reviews as $review)
                                                    {
                                                        if($review->product_id==$relate->Id)
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
                                            <a href="<?=base_url('product-details?id='.$relate->Id)?>">
                                                <img style="height:300px;" src="<?=$relate->Image?>" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="<?=base_url('addtocart?id='.$relate->Id)?>"><i class="fa fa-cart-plus"></i></a>
                                                <a href="<?=base_url('addtowishlist?id='.$relate->Id)?>"><i class="fa fa-heart"></i></a>
                                                <a href="<?=base_url('product-details?id='.$relate->Id)?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span><?=$relate->SalePrice?></h3>
                                            <a class="btn" href="<?=base_url('buynow?id='.$relate->Id)?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <?php
                                        foreach($categories as $category)
                                        {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url('product-list?category='.$category->Id)?>"><i class="fa fa-angle-double-right"></i><?=$category->Name?></a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                            <?php
                                    foreach($feature as $feat)
                                    {
                                ?>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?=$feat->Name?></a>
                                        <div class="ratting">
                                            <?php
                                                $i=1; 
                                                $result=0; 
                                                $j=0;
                                                $k=0;
                                                foreach($reviews as $review)
                                                {
                                                    if($feat->Id==$review->product_id)
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
                                        <a href="product-detail.html">
                                            <img style='height:400px;' src="<?=$feat->Image?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="<?=base_url('addtocart?id='.$feat->Id)?>"><i class="fa fa-cart-plus"></i></a>
                                            <a href="<?=base_url('addtowishlist?id='.$feat->Id)?>"><i class="fa fa-heart"></i></a>
                                            <a href="<?=base_url('product-details?id='.$feat->Id)?>"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span><?=$feat->SalePrice?></h3>
                                        <a class="btn" href="<?=base_url('buynow?id='.$feat->Id)?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="#">Adidas </a><span>(45)</span></li>
                                <li><a href="#">Nike </a><span>(34)</span></li>
                                <li><a href="#">Laces </a><span>(67)</span></li>
                                <li><a href="#">Pull Bear</a><span>(74)</span></li>
                                <li><a href="#">Apple </a><span>(89)</span></li>
                                <li><a href="#">LG</a><span>(28)</span></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="<?=base_url('product-list?category=8')?>">clothes</a>
                            <a href="<?=base_url('product-list?category=3')?>">shoes</a>
                            <a href="<?=base_url('product-list?category=13')?>">grocery</a>
                            <a href="<?=base_url('product-list?category=7')?>">electronics</a>
                            <a href="<?=base_url('product-list?category=10')?>">mobiles</a>
                            <a href="<?=base_url('product-list?category=11')?>">toys</a>
                            <a href="<?=base_url('product-list?category=12')?>">sports</a>
                            <a href="<?=base_url('product-list?category=9')?>">bags</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <!-- Product Detail End -->
        
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
        