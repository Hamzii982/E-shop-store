<!-- Footer Start -->
<div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>E-Shop Store, Jhelum, PAKISTAN</p>
                                <p><i class="fa fa-envelope"></i>hamzamehmood7@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+923-365-131959</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                            <div class="social">
                                <a href="https://twitter.com/hamza_hamzame"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/cricket.is.my.lif/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/in/hamza-mehmood-595a691bb/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.instagram.com/callmehamzzi/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UC8oQZRLNxtVwVGVsv5soM9Q"><i class="fab fa-youtube"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="<?=base_url('about')?>">About Us</a></li>
                                <li><a href="<?=base_url('about')?>">Privacy Policy</a></li>
                                <li><a href="<?=base_url('about')?>">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="<?=base_url('about#paymentpolicy')?>">Payment Policy</a></li>
                                <li><a href="<?=base_url('about#shippingpolicy')?>">Shipping Policy</a></li>
                                <li><a href="<?=base_url('about#returnpolicy')?>">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="/eshop/assets/customerContent/img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="/eshop/assets/customerContent/img/godaddy.svg" alt="Payment Security" />
                            <img src="/eshop/assets/customerContent/img/norton.svg" alt="Payment Security" />
                            <img src="/eshop/assets/customerContent/img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://www.fiverr.com/users/hamzamehmood7/">E-SHOP DESIGNS</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://www.fiverr.com/users/hamzamehmood7/">E-SHOP DESIGNS</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="/eshop/assets/customerContent/lib/easing/easing.min.js"></script>
        <script src="/eshop/assets/customerContent/lib/slick/slick.min.js"></script>
        
        <!--Menu sidebar -->
        <script src="/eshop/assets/customerContent/js/sidebarmenu.js"></script>
        <!-- Template Javascript -->
        <script src="/eshop/assets/customerContent/js/main.js"></script>

        <script>
                $(".itemqty").on("change", function(){
                    var $close=$(this).closest('tr');
                    var rowid=$close.find(".rowid").val();
                    var qty=$close.find('.itemqty').val();
                    console.log(rowid);
                    console.log(qty);    
                    $.ajax({
                        type: "POST",
                        url: "CustomerController/decreaseqty",
                        data: {rowid: rowid, qty: qty}

                    }).done(function(data)
                    {
                        // console.log(data);
                        location.reload();
                    });
                });

                function register(){
                    document.getElementById('register-form').style.display='block';
                    document.getElementById('login-form').style.display='none';
                    document.getElementById('show-register').style.display='none';
                    document.getElementById('show-login').style.display='block';
                    return false;
                }
                function login(){
                    document.getElementById('register-form').style.display='none';
                    document.getElementById('login-form').style.display='block';
                    document.getElementById('show-login').style.display='none';
                    document.getElementById('show-register').style.display='block';
                    return false;
                }
        </script>

        <!-- country with code dropdown -->
    <script>
            $(document).ready(function(){
                $("select.country").change(function(){
                    var selectedCountry = $(".country option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: '../AjaxController/ajax',
                        data: { country : selectedCountry } 
                    }).done(function(data){
                        $("#phone1, #phone2").html(data);
                    });
                });
            });
    </script>

    <!-- Province for the specific country -->
    <script>
            $(document).ready(function(){
                $("select.country").change(function(){
                    var selectedCountry = $(".country option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: '../AjaxController/ajaxprovince',
                        data: { country : selectedCountry } 
                    }).done(function(data){
                        $("#state").html(data);
                    });
                });
            });
    </script>

    <!-- City for the specific province -->
    <script>
            $(document).ready(function(){
                $("select.state").change(function(){
                    var selectedState = $(".state option:selected").val();
                    // console.log(selectedState);
                    $.ajax({
                        type: "POST",
                        url: '../AjaxController/ajaxcity',
                        data: { state : selectedState } 
                    }).done(function(data){
                        // console.log(data);
                        $("#city").html(data);
                    });
                });
            });
    </script>
    </body>
</html>
