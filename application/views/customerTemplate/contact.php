
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Contact</li>
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
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2>Our Office</h2>
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
                            <h2>Our Store</h2>
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
                            <h2>Feedback</h2><br>
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
                    <div class="col-lg-12">
                        <div class="contact-map">
                            <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Jhelum+(E-Shop)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        