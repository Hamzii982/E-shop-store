<?php

    class PaymentController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Seller/PaymentModel');
            $this->load->helper('url');
            if(!$this->session->userdata('sellid'))
            {
                return redirect('seller/login');
            }

        }
        //view Payment method
        public function Payment()
        {
            $seller=$this->session->userdata('selid');
            $data['products']=$this->PaymentModel->view($seller);
            $data['result']=$this->PaymentModel->vieworder();
            $data['details']=$this->PaymentModel->vieworderdet();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Payment/Payment', $data);
            $this->load->view('sellerTemplate/layout/footer');
        }
        //View Insert Payment method
        public function newpage()
        {
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Payment/newpage');
            $this->load->view('sellerTemplate/layout/footer');
        }
        //Insert new Payment method
        public function record(){
            $acname=$this->input->post('acname');
            $bname=$this->input->post('bname');
            $code=$this->input->post('code');
            $add=$this->input->post('address');
            $acn=$this->input->post('acn');
            $ibn=$this->input->post('ibn');
            $data=array(
                'BankName'=> $bname ,
                'Title'=> $acname,
                'BranchCode' => $code,
                'BranchAddress' => $add,
                'AccountNumber' => $acn,
                'IBANNumber' => $ibn,
                'Type' => 'Seller',
                'PersonId' => $this->session->userdata('selid')
            );
            $insert=$this->PaymentModel->record($data);
            if($insert)
            {
                echo '<script type="text/javascript">';
                echo "alert('New Page Has Been Created Successfully.')";
                echo '</script>';
                redirect('seller/Paymentcontroller/Payment');
            }
            else
            {
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
        }
        //Edit Payment method
        public function edit()
        {
                $this->load->view('sellerTemplate/layout/header');
                $id =$this->input->get('id');
                $data['result'] = $this->PaymentModel->edit($id);
                $this->load->view('sellerTemplate/Payment/edit', $data);
                $this->load->view('sellerTemplate/layout/footer');
                    if($this->input->post('Submit'))
                    {
                        $id =$this->input->post('id');
                        $acname=$this->input->post('acname');
                        $bname=$this->input->post('bname');
                        $code=$this->input->post('code');
                        $add=$this->input->post('address');
                        $acn=$this->input->post('acn');
                        $ibn=$this->input->post('ibn');
                        $res=$this->PaymentModel->update($id,$acname,$bname,$code, $add, $acn, $ibn);
                        if($res)
                        {
                            echo '<script type="text/javascript">';
                            echo "alert('Updated successfully')";
                            echo '</script>';
                        }
                        else
                        {
                            echo '<script type="text/javascript">';
                            echo "alert('An Error Occured.')";
                            echo '</script>';
                        }
                        redirect('seller/Paymentcontroller/Payment');
                    }
        }
        //Delete Payment method
        public function Delete()
        {
                $id =$this->input->get('id');
                $delete=$this->PaymentModel->Delete($id);
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
            redirect('seller/PaymentController/Payment');
        }

    }

?>