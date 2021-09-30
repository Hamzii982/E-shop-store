<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E-SHOP -Best eCommerce Site</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="/eshop/assets/customerContent/img/logo.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="/eshop/assets/customerContent/lib/slick/slick.css" rel="stylesheet">
        <link href="/eshop/assets/customerContent/lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/eshop/assets/customerContent/css/style.css" rel="stylesheet">

        <style>
            .rate {
                float: left;
                height: 46px;
                padding: 0 10px;
            }
            .rate:not(:checked) > input {
                position:absolute;
                top:-9999px;
                visibility:hidden;
            }
            .rate:not(:checked) > label {
                float:right;
                width:1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:30px;
                color:#ccc;
            }
            .rate:not(:checked) > label:before {
                content: '★ ';
            }
            .rate > input:checked ~ label {
                color: #ffc700;    
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;  
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: #c59b08;
            }
            .cart-page .cart-summary .cart-btn a {
                margin-top: 15px;
                width: calc(50% - 15px);
                height: 50px;
                padding: 10px 10px !important;
                text-align: center;
                color: #ffffff;
                background: #FF6F61;
                border: none;
                border-radius: 4px;
            }

            .cart-page .cart-summary .cart-btn a:hover {
                color: #FF6F61;
                background: #000000;
            }

            .cart-page .cart-summary .cart-btn a:first-child {
                margin-right: 25px;
                color: #FF6F61;
                background: #ffffff;
                border: 1px solid #FF6F61;
            }

            .cart-page .cart-summary .cart-btn a:first-child:hover {
                color: #ffffff;
                background: #FF6F61;
            }

        </style>
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                            <a href="mailto:hamzamehmood7@email.com">Email Us</a>
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        <a href='tel:+923365131959'>Call Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md sticky-top bg-dark navbar-dark" style="height:50px;">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div id="sidebarnav" class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto sidebar-nav">
                            <a href="<?=base_url('home')?>" class="nav-item nav-link"><i class="fa fa-home"></i>&nbsp&nbspHome</a>
                            <a href="<?=base_url('product-list')?>" class="nav-item nav-link"><i class="fa fa-shopping-bag"></i>&nbsp&nbspProducts</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-align-justify"></i>&nbsp&nbspCategories</a>
                                <div class="dropdown-menu">
                                    <?php
                                        foreach($categories as $category)
                                        {
                                    ?>
                                    <a href="<?=base_url('product-list?category='.$category->Id)?>" class="nav-item nav-link"><i class="fa fa-angle-double-right"></i>&nbsp&nbsp<?=$category->Name?></a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div> 
                            <a href="<?=base_url('contact-us')?>" class="nav-item nav-link"><i class="fa fa-address-card"></i>&nbsp&nbspContact Us</a>
                            <a href="<?=base_url('about')?>" class="nav-item nav-link"><i class="fa fa-heartbeat"></i>&nbsp&nbspAbout Us</a>
                            <a href="<?=base_url('gallery')?>" class="nav-item nav-link"><i class="fa fa-images"></i>&nbsp&nbspGallery</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <?php
                                if($this->session->userdata('customer'))
                                {
                            ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>&nbsp&nbspUser Accounts</a>
                                <div class="dropdown-menu">
                                    <a href="<?=base_url('user-account')?>" class="nav-item nav-link"><i class="fa fa-user"></i>&nbsp&nbspMy Account</a>
                                    <a href="<?=base_url('logout')?>" class="dropdown-item"><i class="fa fa-sign-out-alt"></i>&nbsp&nbspLogout</a>
                                </div>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>&nbsp&nbspUser Accounts</a>
                                <div class="dropdown-menu">
                                    <a href="<?=base_url('login')?>" class="dropdown-item"><i class="fa fa-user"></i>&nbsp&nbspCustomer Login</a>
                                    <a href="<?=base_url('seller/login')?>" class="dropdown-item"><i class="fa fa-user"></i>&nbsp&nbspBecome a Seller</a>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar pt-4">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="/eshop/assets/customerContent/img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="<?=base_url('product-search')?>">
                        <div class="search">
                            <input type="text" name="search" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="<?=base_url('wishlist')?>" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(<?=$num?>)</span>
                            </a>
                            <a href="<?=base_url('cart')?>" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(<?=$this->cart->total_items()?>)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 