<?php

    class AccountController extends CI_Controller{
        // constructor
        public function __construct()
        {
            parent::__construct();
            $this->load->model('AccountModel');
            $this->load->model('LoginModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid')){
                return redirect('seller/login');
            }
        }
        // Home Page
        public function index()
        {
            $data['result'] = $this->AccountModel->demo();
            $data['banks'] = $this->AccountModel->payview();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Account/home', $data);
            $this->load->view('adminTemplate/footer');
        }
        // Delete User
        public function Delete()
        {
            $id =$this->input->get('id');
            $delete=$this->AccountModel->Delete($id);
            if($delete)
            {
                echo "deleted";
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("User Deleted Successfully!","","success");';
                echo '}, 1000);</script>';
            }
            else        
            {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Error!","","error");';
                echo '}, 1000);</script>';
            }
        }
        // Edit User
        public function Edit()
        {
            $this->load->helper('url');
            $this->load->view('adminTemplate/header');
            $id =$this->input->get('id');
            $data['result'] = $this->AccountModel->Edit($id);
            $this->load->view('adminTemplate/Account/edit', $data);
            $this->load->view('adminTemplate/footer');
            if($this->input->post('Submit'))
            {
                $id =$this->input->post('id');
                $name= $this->input->post('name');
                $email= $this->input->post('email');
                $pass= $this->input->post('pass');
                $pass= md5($pass);
                $this->AccountModel->Update($id,$name,$email,$pass);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Updated Successfully!","","success");';
                echo '}, 1000);</script>';
                return redirect('AccountController/index');
            }
        }
        public function VerifySeller()
        {
            $id=$this->input->get('id');
            $verify=$this->AccountModel->verified($id);
            if($verify)
            {
                echo "Verified Successfully";
                return redirect('AccountController/index');
            }
            else
            {
                echo "Error Occured while Verifying";
            }
        }
        //view registration page
        public function register()
        {
            $this->load->view('AdminTemplate/header');
            $this->load->view('AdminTemplate/Account/register');
            $this->load->view('adminTemplate/footer');
        }
        //register new user
        public function insertuser()
        {
            $user=$this->input->post('User');
            $email=$this->input->post('Email');
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
                        'Username'=>$user,
                        'Email'=>$email,
                        'Password'=>$pass,
                        'Role' => 'Admin'
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
                        $mail->setFrom(EMAIL, 'KHANQAH GHAKKAR');
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
                        echo '<script type="text/javascript">';
                        echo "alert('User Has Been Registered Successfully. Please Verify Your Account')";
                        echo '</script>';
                    }
                }
                else{
                    echo '<script type="text/javascript">';
                    echo "alert('Passwords does not Match.')";
                    echo '</script>';
                }
            }
        }
    }


?>