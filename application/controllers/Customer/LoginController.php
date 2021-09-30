<?php
    class LoginController extends CI_Controller{
         // constructor
        public function __construct()
        {
            parent::__construct();
            $this->load->model('LoginModel');
            $this->load->helper('url');
            $this->load->library('encryption');
            //  if($this->session->userdata('userid')){
            //     //  if($this->session->userdata('sellid'))
            //     //  {
            //     //     return redirect('seller/MyController/Index');    
            //     //  }
            //     //  else{
            //         return redirect('MyController/Index');
            //     //  }
            //     }
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
            $pass=$this->input->post('pass');
            $cp=$this->input->post('cpass');
            // echo $email;
            // exit();
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $this->session->set_userdata('error','Invalid Email Format!');
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
                        'Role' => 'Customer'
                    );
                    $insert=$this->LoginModel->insertuser($data);
                    if($insert)
                    {
                        require 'assets/PHPMailerAutoload.php';
                        require 'assets/credential.php';
                        $mail = new PHPMailer();

                        //$mail->SMTPDebug = 4;                               // Enable verbose debug output

                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = EMAIL;                 // SMTP username
                        $mail->Password = PASSWORD;                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                        $mail->setFrom(EMAIL, 'E-store Team');
                        $mail->addAddress($email);     // Add a recipient               // Name is optional
                        $mail->addReplyTo(EMAIL);
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                        $mail->isHTML(true);                                  // Set email format to HTML

                        $mail->Subject = 'Please Verify your Account!';
                        $mail->Body    = "Thanks for signing up!
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
                        $this->session->set_userdata('success','User Has Been Registered Successfully. Please Verify Your Email!');
                        echo '<script type="text/javascript">';
                        echo "alert('User Has Been Registered Successfully. Please Verify Your Account')";
                        echo '</script>';
                    }
                    else
                    {
                        $this->session->set_userdata('error','Email Address Already Exists!');
                    }
                }
                else{
                    $this->session->set_userdata('error','Passwords does not Match');
                    echo '<script type="text/javascript">';
                    echo "alert('Passwords does not Match.')";
                    echo '</script>';
                }
                return redirect('login');
            }
        }
         //verify Account
        public function verify()
        {
            $email=$this->input->get('email');
            $this->LoginModel->verify($email);
        }
        //view Login page
        public function login()
        {
            if($this->session->userdata('customer'))
            {
                return redirect('home');
            }
            else{
                $contents= file_get_contents('../eshop/assets/data.json');
                $data['countries']=json_decode($contents);
                $data['num']=0;
                $this->load->view('customerTemplate/header', $data);
                $this->load->view('customerTemplate/authentication', $data);
                $this->load->view('customerTemplate/footer');
            }
        }
        //Getting data from db to Login
        public function getuser(){
             $email=$this->input->post('email');
             $pass=$this->input->post('pass');
             $uin=$this->LoginModel->log($email);
                $pass= md5($pass);
                // echo $pass;
                // exit();
                if ($pass== $uin)
                {
                    $ulogin=$this->LoginModel->login($email,$uin);
                    if($ulogin)
                    {
                        foreach($ulogin as $ulog)
                        {
                            if($ulog->Role=='Customer' && $ulog->verify==1)
                            {
                                $this->session->set_userdata('success','Logged In Successfully!');
                                $this->session->set_userdata('customer', true);
                                $this->session->set_userdata('customerid', $ulog->Id);
                                $referer = $_SERVER['HTTP_REFERER'];
                                header("Location: $referer");
                            }
                            else
                            {
                                $this->session->set_userdata('error','Invalid Email or Password/Please Verify your email address!');
                                echo "Please verify your Account";
                            }
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('error','Invalid Email Or Password Or Verify Your Account');
                        echo '<script type="text/javascript">';
                        echo "alert('Invalid Email Or Password Or Verify Your Account.')";
                        echo '</script>';
                    }
                }
                else{
                    $this->session->set_userdata('error','Invalid Email Or Password ');
                    echo '<script type="text/javascript">';
                    echo "alert('Invalid Email Or Password.')";
                    echo '</script>';
                }
                return redirect('login');
        }
        //logout function
        public function logout(){
            $this->session->unset_userdata('customer');
            $this->session->unset_userdata('customerid');
            $this->session->set_userdata('success','Logged out Successfully');
            return redirect('login');
        }
    }


?>