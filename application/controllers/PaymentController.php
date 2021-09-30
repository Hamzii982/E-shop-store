<?php

    class PaymentController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('PaymentModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid'))
            {
                return redirect('seller/login');
            }

        }
        //view Payment method
        public function Payment()
        {
            $data['products']=$this->PaymentModel->viewproduct();
            $data['sellers']=$this->PaymentModel->viewseller();
            $data['result']=$this->PaymentModel->vieworder();
            $data['details']=$this->PaymentModel->vieworderdet();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Payment/Payment', $data);
            $this->load->view('adminTemplate/footer');
        }
        //View Insert Payment method
        public function newpage()
        {
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Payment/newpage');
            $this->load->view('adminTemplate/footer');
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
                'IBANNumber' => $ibn
            );
            $insert=$this->PaymentModel->record($data);
            if($insert)
            {
                $this->session->set_userdata('success','Added Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('New Page Has Been Created Successfully.')";
                echo '</script>';
                redirect('admin/payments');
            }
            else
            {
                $this->session->set_userdata('error','An Error Occured!');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
        }
        //Edit Payment method
        public function edit()
        {
                $this->load->view('adminTemplate/header');
                $id =$this->input->get('id');
                $data['result'] = $this->PaymentModel->edit($id);
                $this->load->view('adminTemplate/Payment/edit', $data);
                $this->load->view('adminTemplate/footer');
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
                            $this->session->set_userdata('success','Updated Payment Account Successfully!');
                            echo '<script type="text/javascript">';
                            echo "alert('Updated successfully')";
                            echo '</script>';
                        }
                        else
                        {
                            $this->session->set_userdata('error','An Error Occured!');
                            echo '<script type="text/javascript">';
                            echo "alert('An Error Occured.')";
                            echo '</script>';
                        }
                        redirect('admin/payments');
                    }
        }
        //Delete Payment method
        public function Delete()
        {
                $id =$this->input->get('id');
                $delete=$this->PaymentModel->Delete($id);
                if($delete)
            {
                $this->session->set_userdata('success',' Deleted Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
            }
                else
                
            {
                $this->session->set_userdata('error','An Error Occured !');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
            redirect('admin/payments');
        }

    }

?>