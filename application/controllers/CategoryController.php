<?php

    class CategoryController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('CategoryModel');
            $this->load->helper('url');
            if(!$this->session->userdata('userid'))
            {
                return redirect('seller/login');
            }

        }
        //view Category page
        public function Category()
        {
            $data['result']=$this->CategoryModel->view();
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Category/Category', $data);
            $this->load->view('adminTemplate/footer');
        }
        //View Insert new Category page
        public function newpage()
        {
            $this->load->view('adminTemplate/header');
            $this->load->view('adminTemplate/Category/newpage');
            $this->load->view('adminTemplate/footer');
        }
        //Insert new Category
        public function record(){
            $name=$this->input->post('name');
            $desc=$this->input->post('desc');
            $sup=$this->input->post('sup');
            $data=array(
                'Name'=> $name 
            );
            $insert=$this->CategoryModel->record($data);
            if($insert)
            {
                $this->session->set_userdata('success','New Category has been Created Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('New Page Has Been Created Successfully.')";
                echo '</script>';
                redirect('admin/categories');
            }
            else
            {
                $this->session->set_userdata('error','An Error Occured Add New Category!');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
                redirect('admin/categories/add-new');
            }
        }
        //Edit Category
        public function edit()
        {
                $this->load->view('adminTemplate/header');
                $id =$this->input->get('id');
                $data['result'] = $this->CategoryModel->edit($id);
                $this->load->view('adminTemplate/Category/edit', $data);
                $this->load->view('adminTemplate/footer');
                    if($this->input->post('Submit'))
                    {
                        $id =$this->input->post('id');
                        $name=$this->input->post('name');
                        $desc=$this->input->post('desc');
                        $sup=$this->input->post('sup');
                        $res=$this->CategoryModel->update($id,$name);
                        if($res)
                        {
                            $this->session->set_userdata('success','Updated Successfully!');
                            echo '<script type="text/javascript">';
                            echo "alert('Updated successfully')";
                            echo '</script>';
                            redirect('admin/categories');
                        }
                        else
                        {
                            $this->session->set_userdata('error','An Error Occured While Updating!');
                            echo '<script type="text/javascript">';
                            echo "alert('An Error Occured.')";
                            echo '</script>';
                            redirect('admin/categories/edit');
                        }
                    }
        }
        //Delete Category
        public function Delete()
        {
                $id =$this->input->get('id');
                $delete=$this->CategoryModel->Delete($id);
                if($delete)
                {
                $this->session->set_userdata('success','Category Deleted Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
                }
                else
                
                {
                    $this->session->set_userdata('error','An Error Occured While Deleting category!');
                    echo '<script type="text/javascript">';
                    echo "alert('An Error Occured.')";
                    echo '</script>';
                }
            redirect('admin/categories');
        }

    }

?>