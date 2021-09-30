<?php

    class OrderController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('OrderModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid')){
                return redirect('seller/login');
            }

        }
        //view Orders
        public function order()
        {
            $data['result']=$this->OrderModel->vieworder();
            $data['details']=$this->OrderModel->orderdet();
            $data['products']=$this->OrderModel->viewprod();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Orders/order', $data);
            $this->load->view('adminTemplate/footer');
        }
        
        public function feedback()
        {
            $data['result']=$this->OrderModel->feedbacks();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Feedbacks/feedback', $data);
            $this->load->view('adminTemplate/footer');
        }

        public function review()
        {
            $data['result']=$this->OrderModel->viewprod();
            $data['reviews']=$this->OrderModel->reviews();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Reviews/review', $data);
            $this->load->view('adminTemplate/footer');
        }

        public function reply()
        {
            $id =$this->input->get('id');
            $data['result']=$this->OrderModel->feedback($id);
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Feedbacks/reply', $data);
            $this->load->view('adminTemplate/footer');
        }

        public function newreply()
        {
            $email=$this->input->post('email');
            $subject=$this->input->post('subject');
            $msg=$this->input->post('msg');
                require 'assets/PHPMailerAutoload.php';
                require 'assets/credential.php';
                $mail = new PHPMailer();

                        // $mail->SMTPDebug = 4;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = EMAIL;                 // SMTP username
                $mail->Password = PASSWORD;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->setFrom(EMAIL, 'E-SHOP E-Commerce Store');
                $mail->addAddress($email);     // Add a recipient               // Name is optional
                $mail->addReplyTo(EMAIL);
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = $subject;
                $mail->Body    = $msg;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {
                    $this->session->set_userdata('error','Message Could No Be sent!');
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
                else {
                    $this->session->set_userdata('success','Reply Has been Sent Successfully!');
                    echo 'Message has been sent';
                    return redirect('admin/feedbacks');
                }
        }

        //Delete Product
        public function delete()
        {
                $id =$this->input->get('id');
                $delete=$this->OrderModel->deleteorder($id);
                if($delete)
            {
                $this->session->set_userdata('success','Deleted Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
            }
                else
                
            {
                $this->session->set_userdata('error','An Error Occured While Deleting!');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
            redirect('admin/orders');
        }

        public function approve()
        {
                $id =$this->input->get('id');
                $update=$this->OrderModel->update($id);
                if($update)
            {
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
            }
                else
                
            {
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
            redirect('admin/orders');
        }

        public function deleterev()
        {
                $id =$this->input->get('id');
                $delete=$this->OrderModel->deleterev($id);
                if($delete)
            {
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
            }
                else
                
            {
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
            redirect('admin/reviews');
        }

    }

?>