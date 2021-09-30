<?php

    class AccountController extends CI_Controller{
        // constructor
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Seller/AccountModel');
            $this->load->helper('url');
            if(!$this->session->userdata('sellid')){
                return redirect('seller/login');
            }
        }
        // Home Page
        public function index()
        {
            $seller=$this->session->userdata('selid');
            $data['result'] = $this->AccountModel->demo($seller);
            $this->load->view('sellerTemplate/Layout/header');
            $this->load->view('sellerTemplate/User/User', $data);
            $this->load->view('sellerTemplate/Layout/footer');
        }
        // Delete User
        public function Delete()
        {
            $id =$this->input->get('id');
            $delete=$this->Accountmodel->Delete($id);
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
            
                $id =$this->input->post('id');
                $name= $this->input->post('name');
                $email= $this->input->post('email');
                $fname= $this->input->post('fname');
                $lname=$this->input->post('lname');
                $add=$this->input->post('address');
                $about=$this->input->post('about');
                $mobile=$this->input->post('mobile');
                $city=$this->input->post('city');
                $country=$this->input->post('country');
                $this->AccountModel->Update($id,$name,$email,$add,$fname,$lname,$mobile,$about, $city, $country);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Updated Successfully!","","success");';
                echo '}, 1000);</script>';
                return redirect('seller/account');
        }
    }


?>