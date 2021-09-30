<?php
    class LoginController extends CI_Controller{
         // constructor
        public function __construct()
        {
            parent::__construct();
            $this->load->model('LoginModel');
            $this->load->helper('url');
            $this->load->library('encryption', 'cart');
        }

        //register new user
        public function insertuser()
        {
            $fname=$this->input->post('fname');
            $lname=$this->input->post('lname');
            $email=$this->input->post('email');
            $country=$this->input->post('country');
            $state=$this->input->post('state');
            $city=$this->input->post('city');
            $address=$this->input->post('address');
            $phone=$this->input->post('phonecode');
            $mobile=$this->input->post('mobile');
            $zip=$this->input->post('zip');
            $pass=$this->input->post('Password');
            $cp=$this->input->post('cPassword');
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                echo 'Invalid Email';
            }
            else
            {
                if($pass==$cp)
                {
                    $pass= md5($pass);
                    $data=array(
                        'Username'=>$fname.$lname,
                        'FirstName' => $fname,
                        'LastName' => $lname,
                        'Email'=>$email,
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                        'Address' => $address,
                        'Mobile' => $phone.$mobile,
                        'zip' => $zip,
                        'Password'=>$pass,
                        'Role' => 'Seller'
                    );
                    $insert=$this->LoginModel->insertuser($data);
                    if($insert)
                    {
                        require 'assets/PHPMailerAutoload.php';
                        require 'assets/credential.php';
                        $mail = new PHPMailer();

                        $mail->SMTPDebug = 4;                               // Enable verbose debug output

                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = EMAIL;                 // SMTP username
                        $mail->Password = PASSWORD;                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                        $mail->setFrom(EMAIL, 'E-SHOP e-commerce Store');
                        $mail->addAddress($email);     // Add a recipient               // Name is optional
                        $mail->addReplyTo(EMAIL);
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                        $mail->isHTML(true);                                  // Set email format to HTML

                        $mail->Subject = 'Please Verify your Account!';
                        $mail->Body    = "Thanks for signing up on E-SHOP!
                        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                        Please click this link to activate your account:
                        <a href='http://localhost/eshop/LoginController/verify?email=$email' class='btn btn-primary'>VERIFY ACCOUNT</a>";
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        if(!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        }
                        else {
                            echo 'Message has been sent';
                        }
                        $this->session->set_userdata('success','User Has Been Registered Successfully, Please Verify Your Account!');
                        echo '<script type="text/javascript">';
                        echo "alert('User Has Been Registered Successfully. Please Verify Your Account')";
                        echo '</script>';
                        return redirect('seller/login');
                    }
                    else
                    {
                        $this->session->set_userdata('error','This Email Address Already Exists!');
                        return redirect('seller/login');
                    }
                }
                else{
                    $this->session->set_userdata('error','Passwords does not Match!');
                    echo '<script type="text/javascript">';
                    echo "alert('Passwords does not Match.')";
                    echo '</script>';
                    return redirect('seller/login');
                }
            }
        }
         //verify Account
        public function verify()
        {
            $email=$this->input->get('email');
            $this->LoginModel->verify($email);
        }
        //view Login page
        public function register()
        {
            $this->load->library('cart');
            $contents= file_get_contents('../eshop/assets/data.json');
            $data['countries']=json_decode($contents);
            // print_r($data['countries']);
            $data['num']=0;
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $this->load->view('customerTemplate/header', $data);
             $this->load->view('authentication/register', $data);
             $this->load->view('customerTemplate/footer');
        }
        //Getting data from db to Login
        public function getuser(){
             $email=$this->input->post('Email');
             $pass=$this->input->post('Password');
             $uin=$this->LoginModel->log($email);
                $pass= md5($pass);
                if ($pass== $uin)
                {
                    $ulogin=$this->LoginModel->login($email,$uin);
                    // print_r($ulogin);
                    if($ulogin)
                    {
                        foreach($ulogin as $ulog)
                        {
                            if($ulog->Role=='Seller')
                            {
                                if($ulog->verify==2)
                                {
                                    $this->session->set_userdata('success','Logged in Successfully!');
                                    $this->session->set_userdata('sellid', true);
                                    $this->session->set_userdata('selid', $ulog->Id);
                                    return redirect('seller/home');    
                                }
                                else
                                {
                                    $this->session->set_userdata('error','Our Admins are looking at your profile, Please Wait Till Verification!');
                                    echo "Please Wait Till Verification";
                                    return redirect('seller/login');
                                }    
                            }
                            elseif($ulog->Role=='Admin')
                            {
                                if($ulog->verify==1)
                                {
                                    $this->session->set_userdata('success','Logged in Successfully!');
                                    $this->session->set_userdata('userid', true);
                                    return redirect('admin/home');
                                }
                                else{
                                    $this->session->set_userdata('error','Please Verify your email Address!');
                                    $this->session->set_userdata('error','Please Wait till Verification!');
                                    echo "Please Wait Till Verification";
                                    return redirect('seller/login');
                                }    
                            }
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('error','Invalid Email Or Password Or Verify Your Account!');
                        echo '<script type="text/javascript">';
                        echo "alert('Invalid Email Or Password Or Verify Your Account.')";
                        echo '</script>';
                        return redirect('seller/login');
                    }
            }
            else{
                $this->session->set_userdata('error','Invalid Email Or Password!');
                echo '<script type="text/javascript">';
                echo "alert('Invalid Email Or Password.')";
                echo '</script>';
                return redirect('seller/login');
            }
        }
        //logout function
        public function logout(){
            $this->session->set_userdata('success','Logged Out Successfully!');
            $this->session->unset_userdata('userid');
            $this->session->unset_userdata('sellid');
            $this->session->unset_userdata('selid');
            return redirect('seller/login');
        }
    }


?>