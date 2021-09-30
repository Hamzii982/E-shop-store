<?php

    class OrderController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('seller/OrderModel');
            $this->load->helper('url');
            if(!$this->session->userdata('sellid')){
                return redirect('seller/login');
            }

        }
        //view Product
        public function order()
        {
            $seller=$this->session->userdata('selid');
            $data['result']=$this->OrderModel->view($seller);
            $data['orders']=$this->OrderModel->viewcat();
            $data['details']=$this->OrderModel->orderv();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Orders/order', $data);
            $this->load->view('sellerTemplate/layout/footer');
        }

        public function review()
        {
            $seller=$this->session->userdata('selid');
            $data['result']=$this->OrderModel->view($seller);
            $data['reviews']=$this->OrderModel->reviews();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Reviews/review', $data);
            $this->load->view('sellerTemplate/layout/footer');
        }
        
        //Delete Product
        public function deliver()
        {
                $id =$this->input->get('id');
                $order=$this->input->get('order');
                $deliver=$this->OrderModel->deliver($id);
                $result=0;
                if($deliver)
                {
                    $orders=$this->OrderModel->orderdetails($order);
                    $number=count($orders);
                    foreach($orders as $ord)
                    {
                        if($ord->status==1)
                        {
                            $result++;
                        }
                    }
                    if($result==$number)
                    {
                        $delivered=$this->OrderModel->delivered($order);
                        if($delivered)
                        {
                            echo "Successfully Delivered Product";
                        }
                        else
                        {
                            echo "An error occured";
                        }
                        
                    }
                    echo '<script type="text/javascript">';
                    echo "alert('Order Delivered Successfully.')";
                    echo '</script>';
                }
                else
                
                {
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
                }
                redirect('seller/orders');
        }

    }

?>