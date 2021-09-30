<?php

    class MyController extends CI_Controller{
        // constructor
        public function __construct()
        {
            parent::__construct();
            $this->load->model('MyModel');
            $this->load->helper('url');
            if(!$this->session->userdata('sellid')){
                return redirect('seller/login');
            }
        }
        // Home Page
        public function index()
        {
            $data['sellerid']=$this->session->userdata('selid');
            $sell_id = $data['sellerid'];
            $data['products'] = $this->MyModel->seller_products($sell_id);
            $data['orders'] = $this->MyModel->seller_orders($sell_id);
            $data['reviews'] = $this->MyModel->get_recent_reviews();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Dashboard/Dashboard', $data);
            $this->load->view('sellerTemplate/layout/footer');
        }
        public function user()
        {
            //$data['result'] = $this->MyModel->demo();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/User/user');
            $this->load->view('sellerTemplate/layout/footer');
        }
        // Insert User view page
        public function new()
        {
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Dashboard/newpage');
            $this->load->view('adminTemplate/footer');
        }
        // Insert User
        public function pagerec(){
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $pass=$this->input->post('pass');
            $data=array(
                'Username'=> $name ,
                'Email'=> $email,
                'Password' => $pass
            );
            $insert=$this->MyModel->insertrec($data);
            if($insert)
            {
                echo "Created";
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("User Created Successfully!","","success");';
                echo '}, 1000);</script>';
                return redirect('mycontroller/index');
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Error!","","error");';
                echo '}, 1000);</script>';
            }
        }
        // Delete User
        public function Delete()
        {
            $id =$this->input->get('id');
            $delete=$this->mymodel->Delete($id);
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
            return redirect('mycontroller/index');
        }
        // Edit User
        public function Edit()
        {
            $this->load->helper('url');
            $this->load->view('adminTemplate/header');
            $id =$this->input->get('id');
            $data['result'] = $this->MyModel->Edit($id);
            $this->load->view('adminTemplate/Dashboard/edit', $data);
            $this->load->view('adminTemplate/footer');
            if($this->input->post('Submit'))
            {
                $id =$this->input->post('id');
                $name= $this->input->post('name');
                $email= $this->input->post('email');
                $pass= $this->input->post('pass');
                $pass= md5($pass);
                $this->MyModel->Update($id,$name,$email,$pass);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Updated Successfully!","","success");';
                echo '}, 1000);</script>';
            }
            return redirect('mycontroller/index');
        }
    }


?>