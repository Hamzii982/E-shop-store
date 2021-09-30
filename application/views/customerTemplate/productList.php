 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('product-list')?>">Products</a></li>
                    <li class="breadcrumb-item active">Product List</li>
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
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form method='post' action='<?=base_url('product-search')?>'>
                                            <div class="product-search">
                                                <input type="text" name="search" placeholder="Search by Product Name">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="<?=base_url('product-list?filter=new')?>" class="dropdown-item">Newest</a>
                                                        <a href="<?=base_url('product-list?filter=feature')?>" class="dropdown-item">Popular</a>
                                                        <a href="<?=base_url('product-list?filter=selling')?>" class="dropdown-item">Most sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="<?=base_url('product-list?range=1')?>" class="dropdown-item">$0 to $50</a>
                                                        <a href="<?=base_url('product-list?range=50')?>" class="dropdown-item">$51 to $100</a>
                                                        <a href="<?=base_url('product-list?range=100')?>" class="dropdown-item">$101 to $200</a>
                                                        <a href="<?=base_url('product-list?range=200')?>" class="dropdown-item">$201 to $500</a>
                                                        <a href="<?=base_url('product-list?range=500')?>" class="dropdown-item">$501 to $1000</a>
                                                        <a href="<?=base_url('product-list?range=1000')?>" class="dropdown-item">> $1000</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                foreach($products as $product)
                                {
                            ?>
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?=$product->Name?></a>
                                        <div class="ratting">
                                            <?php
                                                $i=1; 
                                                $result=0; 
                                                $j=0;
                                                $k=0;
                                                foreach($reviews as $review)
                                                {
                                                    if($product->Id==$review->product_id)
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
                                            <img style='height:300px; ' src="<?=$product->Image?>" alt="Product Image">
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
                            ?>
                        </div>
                        
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="<?=base_url('product-list?page='.$previous.'')?>" tabindex="-1">Previous</a>
                                    </li>
                                    <?php for($i=1; $i<=$pages;$i++)
                                        {
                                    ?>
                                    <li class="page-item active"><a class="page-link" href="<?=base_url('product-list?page='.$i.'')?>"><?=$i?></a></li>
                                    <?php
                                        }
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?=base_url('product-list?page='.$next.'')?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
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
        <!-- Product List End -->  
        
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
        
        