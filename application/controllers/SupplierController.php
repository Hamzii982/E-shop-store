<?php

    class SupplierController extends CI_Controller{
        // constructor
        public function __construct()
        {
            parent::__construct();
            $this->load->model('SupplierModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid')){
                return redirect('seller/login');
            }
        }
        // Home Page
        public function supplier()
        {
            $data['result'] = $this->SupplierModel->demo();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Supplier/supplier', $data);
            $this->load->view('adminTemplate/footer');
        }
        //Supplier Insert Page
        public function new()
        {
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Supplier/newpage');
            $this->load->view('adminTemplate/footer');
        }
        // Insert new Supplier
        public function pagerec(){
            $name=$this->input->post('name');
            $add=$this->input->post('add');
            $phone=$this->input->post('phone');
            $data=array(
                'Name'=> $name ,
                'Address'=> $add,
                'Phone' => $phone
            );
            $insert=$this->SupplierModel->insertrec($data);
            if($insert)
            {
                echo "Created";
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("User Created Successfully!","","success");';
                echo '}, 1000);</script>';
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Error!","","error");';
                echo '}, 1000);</script>';
            }
            return redirect('suppliercontroller/supplier');
        }
        // Delete Supplier
        public function Delete()
        {
            $id =$this->input->get('id');
            $delete=$this->Suppliermodel->Delete($id);
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
            return redirect('supplierconroller/supplier');
        }
        // Edit Supplier
        public function Edit()
        {
            $this->load->helper('url');
            $this->load->view('adminTemplate/header');
            $id =$this->input->get('id');
            $data['result'] = $this->SupplierModel->Edit($id);
            $this->load->view('adminTemplate/Supplier/edit', $data);
            $this->load->view('adminTemplate/footer');
            if($this->input->post('Submit'))
            {
                $id =$this->input->post('id');
                $name= $this->input->post('name');
                $add= $this->input->post('add');
                $phone= $this->input->post('phone');
                $this->SupplierModel->Update($id,$name,$add,$phone);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Updated Successfully!","","success");';
                echo '}, 1000);</script>';
            }
            return redirect('Suppliercontroller/supplier');
        }
    }


?>