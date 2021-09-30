<?php

    class SubCategoryController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('SubCategoryModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid'))
            {
                return redirect('seller/login');
            }

        }
        //view Category page
        public function Category()
        {
            $data['result']=$this->SubCategoryModel->view();
            $data['resultcat']=$this->SubCategoryModel->viewcat();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/SubCategory/Category', $data);
            $this->load->view('adminTemplate/footer');
        }
        //View Insert new Category page
        public function newpage()
        {
            $data['resultcat']=$this->SubCategoryModel->viewcat();
            // print_r($data['resultcat']);
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/SubCategory/newpage', $data);
            $this->load->view('adminTemplate/footer');
        }
        //Insert new Category
        public function record(){
            $name=$this->input->post('name');
            $cname=$this->input->post('cname');
            $data=array(
                'name'=> $name,
                'category_fid' => $cname
            );
            $insert=$this->SubCategoryModel->record($data);
            if($insert)
            {
                $this->session->set_userdata('success','Sub-Category Added Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('New Category Has Been Created Successfully.')";
                echo '</script>';
                redirect('admin/sub-categories');
            }
            else
            {
                $this->session->set_userdata('error','An Error Occured !');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
        }
        //Edit Category
        public function edit()
        {
                $this->load->view('adminTemplate/header');
                $id =$this->input->get('id');
                $data['result'] = $this->SubCategoryModel->edit($id);
                $data['resultcat']=$this->SubCategoryModel->viewcat();
                $this->load->view('adminTemplate/SubCategory/edit', $data);
                $this->load->view('adminTemplate/footer');
                    if($this->input->post('Submit'))
                    {
                        $id =$this->input->post('id');
                        $name=$this->input->post('name');
                        $cname=$this->input->post('cname');
                        $res=$this->SubCategoryModel->update($id,$name, $cname);
                        if($res)
                        {
                            $this->session->set_userdata('success','Updated Successfully!');
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
                        redirect('admin/sub-categories');
                    }
        }
        //Delete Category
        public function Delete()
        {
                $id =$this->input->get('id');
                $delete=$this->SubCategoryModel->Delete($id);
                if($delete)
            {
                $this->session->set_userdata('success','Deleted Successfully!');
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
            redirect('admin/sub-categories');
        }

    }

?>