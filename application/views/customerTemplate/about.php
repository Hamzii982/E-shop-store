
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">E-SHOP</a></li>
                    <li class="breadcrumb-item active">About Us</li>
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
        
        <!-- Contact Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>About Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nam non sollicitudin ex, id pellentesque mi. Vivamus et egestas sem, eget porttitor metus.
                                <br> Ut non vehicula tortor, et sodales ex. Curabitur sit amet felis ante.
                                 Donec dignissim interdum maximus. Donec dictum ornare congue. Curabitur tempus euismod 
                                 ipsum. Nam elementum, ipsum ut hendrerit vestibulum, dolor ipsum dignissim odio,
                                  sed facilisis nunc libero in urna. Aenean non risus urna. Sed tristique nibh vel ex 
                                  efficitur tempor. Phasellus blandit, felis at posuere bibendum, turpis nulla blandit 
                                  tortor, sed pellentesque tortor diam eget risus. Maecenas gravida eu dui in posuere.<br>

                                Vestibulum efficitur eros vitae sapien bibendum, sed efficitur justo gravida.
                                Nulla eget hendrerit nisi. Etiam nec imperdiet magna, id convallis odio.
                                Aliquam tempor augue fermentum leo placerat, eget maximus quam vestibulum.
                               Quisque ac accumsan lacus. Vestibulum accumsan porttitor purus, eget luctus leo cursus vel.
                                Maecenas sit amet ex vitae erat tristique tempus. Pellentesque habitant morbi tristique
                                 senectus et netus et malesuada fames ac turpis egestas. Donec libero ligula, aliquet id
                                  tortor ac, pharetra tincidunt diam. In nunc quam, elementum ut dui sed, porttitor
                                   convallis mi. Cras elementum lacinia semper. In ullamcorper efficitur massa, vel accumsan tortor
                                    commodo eget. Nulla facilisi. Donec vehicula nisi in ultricies porta.
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2 id='paymentpolicy'>Payment Policy</h2>
                            <h3><i class="fa fa-map-marker"></i>E-Shop Office, Jhelum, PAKISTAN</h3>
                            <h3><i class="fa fa-envelope"></i>hamzamehmood7@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>+923-365-131959</h3>
                            <div class="social">
                                <a href="https://twitter.com/hamza_hamzame"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/cricket.is.my.lif/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/in/hamza-mehmood-595a691bb/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.instagram.com/callmehamzzi/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UC8oQZRLNxtVwVGVsv5soM9Q"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2 id='shippingpolicy'>Shipping Policy</h2>
                            <h3><i class="fa fa-map-marker"></i>E-Shop Store, Jhelum, PAKISTAN</h3>
                            <h3><i class="fa fa-envelope"></i>hamzamehmood7@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>+923-365-131959</h3>
                            <div class="social">
                            <a href="https://twitter.com/hamza_hamzame"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/cricket.is.my.lif/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/in/hamza-mehmood-595a691bb/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.instagram.com/callmehamzzi/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UC8oQZRLNxtVwVGVsv5soM9Q"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-form">
                            <h2 id='returnpolicy'>Return Policy</h2><br>
                            <form method='post' action="<?=base_url('newcontact')?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="msg" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div><button class="btn" type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        