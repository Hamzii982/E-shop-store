<?php

    class ProductController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('ProductModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid')){
                return redirect('seller/login');
            }

        }
        //view Product
        public function Product()
        {
            $data['result']=$this->ProductModel->view();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Products/Product', $data);
            $this->load->view('adminTemplate/footer');
        }
        //View Insert Product Page
        public function newpage()
        {
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Products/newpage');
            $this->load->view('adminTemplate/footer');
        }
        //Insert new Product
        public function record(){
            $name=$this->input->post('name');
            $desc=$this->input->post('desc');
            $cat=$this->input->post('cat');
            $pprice=$this->input->post('pprice');
            $sprice=$this->input->post('sprice');
            $img=$this->input->post('img');
            $img="/eshop/assets/images/$img";
            $data=array(
                'Name'=> $name ,
                'Description'=> $desc,
                'Category' => $cat,
                'PurchasePrice' => $pprice,
                'SalePrice' => $sprice,
                'Image' => $img
            );
            $insert=$this->ProductModel->record($data);
            if($insert)
            {
                $this->session->set_userdata('success','Product Added Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('New Page Has Been Created Successfully.')";
                echo '</script>';
                redirect('admin/products');
            }
            else
            {
                $this->session->set_userdata('error','An Error Occured !');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
        }
        //Edit Product
        public function edit()
        {
                $this->load->view('adminTemplate/header');
                $id =$this->input->get('id');
                $data['result'] = $this->ProductModel->edit($id);
                $this->load->view('adminTemplate/Products/edit', $data);
                $this->load->view('adminTemplate/footer');
                    if($this->input->post('Submit'))
                    {
                        $id =$this->input->post('id');
                        $name=$this->input->post('name');
                        $desc=$this->input->post('desc');
                        $cat=$this->input->post('cat');
                        $pprice=$this->input->post('pprice');
                        $sprice=$this->input->post('sprice');
                        $img=$this->input->post('img');
                        if($img!="")
                        {
                            $img="/eshop/assets/images/$img";
                            $res=$this->ProductModel->update($id,$name,$desc, $cat, $pprice, $sprice, $img);
                        }
                        else
                        {
                            $img=$this->input->post('imge');
                            $img="/eshop/assets/images/$img";
                            $res=$this->ProductModel->update($id,$name,$desc, $cat, $pprice, $sprice, $img);
                        }
                        if($res)
                        {
                            $this->session->set_userdata('success','Updated Successfully!');
                            echo '<script type="text/javascript">';
                            echo "alert('Updated successfully')";
                            echo '</script>';
                        }
                        else
                        {
                            $this->session->set_userdata('success','An Error Occured !');
                            echo '<script type="text/javascript">';
                            echo "alert('An Error Occured.')";
                            echo '</script>';
                        }
                        redirect('admin/products');
                    }
        }
        //Delete Product
        public function Delete()
        {
                $id =$this->input->get('id');
                $delete=$this->ProductModel->Delete($id);
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
            redirect('admin/products');
        }

        public function feature()
        {
            $id=$this->input->get('id');
            $featured=$this->ProductModel->feature($id);
            if($featured)
            {
                $this->session->set_userdata('success','Product Added To Featured Successfully!');
                echo "Product Added to featured Products";

            }
            else
            {
                $this->session->set_userdata('error','An Error Occured !');
                echo "Product can't be featured";
            }
            return redirect('admin/products');
        }
        public function unfeature()
        {
            $id=$this->input->get('id');
            $featured=$this->ProductModel->unfeature($id);
            if($featured)
            {
                $this->session->set_userdata('success','Product Removed From Featured Successfully!');
                echo "Product Removed from featured Products";

            }
            else
            {
                $this->session->set_userdata('error','An Error Occured !');
                echo "Product can't be Unfeatured";
            }
            return redirect('admin/products');
        }

    }

?>