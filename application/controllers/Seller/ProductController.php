<?php

    class ProductController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('seller/ProductModel');
            $this->load->helper('url');
            if(!$this->session->userdata('sellid')){
                return redirect('seller/login');
            }

        }
        //view Product
        public function Product()
        {
            $seller=$this->session->userdata('selid');
            echo $seller;
            $data['result']=$this->ProductModel->view($seller);
            $data['cat']=$this->ProductModel->viewcat();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Products/Product', $data);
            $this->load->view('sellerTemplate/layout/footer');
        }
        //View Insert Product Page
        public function newpage()
        {
            $data['cat']=$this->ProductModel->viewcat();
            $this->load->view('sellerTemplate/layout/header');
            $this->load->view('sellerTemplate/Products/newpage', $data);
            $this->load->view('sellerTemplate/layout/footer');
        }
        //Insert new Product
        public function record(){
            $name=$this->input->post('name');
            $desc=$this->input->post('desc');
            $cat=$this->input->post('cat');
            $pprice=$this->input->post('pprice');
            $sprice=$this->input->post('sprice');
            $qty=$this->input->post('qty');
            $pid=$this->session->userdata('selid');
            $file_name= $_FILES['img']["name"];
            $temp_name =$_FILES["img"]["tmp_name"];
            $folder= "../../eshop/assets/images/".$file_name;
            move_uploaded_file($temp_name,$folder);
            $img="/eshop/assets/images/$file_name";
            $data=array(
                'Name'=> $name ,
                'Description'=> $desc,
                'Category' => $cat,
                'PurchasePrice' => $pprice,
                'SalePrice' => $sprice,
                'Quantity' => $qty,
                'Image' => $img,
                'supplier_FID'=> $pid
            );
            $insert=$this->ProductModel->record($data);
            require 'assets/PHPMailerAutoload.php';
            require 'assets/credential.php';
            if($insert)
            {
                $emails=$this->ProductModel->email();
                foreach($emails as $mail)
                {
                    $email=$mail->email;
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

                    $mail->Subject = "Take a Look at Our New Arrival";
                    $mail->Body    = "Hi! Look What's New Arrived in our E-Shop:<br>
                    Product Name: $name<br>
                    Product Description: $desc<br>
                    Product Price: $sprice<br>
                    Checkout Vast Variety at our Website: <a href='http://localhost/eshop/home'>E-SHOP HOME<a>";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }
                    else {
                        echo 'Message has been sent';
                    }
                }
                echo '<script type="text/javascript">';
                echo "alert('New Page Has Been Created Successfully.')";
                echo '</script>';
                redirect('seller/products');
            }
            else
            {
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
        }
        //Edit Product
        public function edit()
        {
                $this->load->view('sellerTemplate/layout/header');
                $id =$this->input->get('id');
                $data['result'] = $this->ProductModel->edit($id);
                $data['cat']=$this->ProductModel->viewcat();
                $this->load->view('sellerTemplate/Products/edit', $data);
                $this->load->view('sellerTemplate/layout/footer');
                    if($this->input->post('Submit'))
                    {
                        $id =$this->input->post('id');
                        $name=$this->input->post('name');
                        $desc=$this->input->post('desc');
                        $cat=$this->input->post('cat');
                        $pprice=$this->input->post('pprice');
                        $sprice=$this->input->post('sprice');
                        $qty=$this->input->post('qty');
                        $file_name= $_FILES['img']["name"];
                        if($file_name!="")
                        {
                            $temp_name =$_FILES["img"]["tmp_name"];
                            $folder= "../../eshop/assets/images/".$file_name;
                            move_uploaded_file($temp_name,$folder);
                            $img="/eshop/assets/images/$file_name";   
                            $res=$this->ProductModel->update($id,$name,$desc, $cat, $pprice, $sprice, $img, $qty);
                        }
                        else
                        {
                            $img=$this->input->post('imge');
                            $res=$this->ProductModel->update($id,$name,$desc, $cat, $pprice, $sprice, $img, $qty);
                        }
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
                        redirect('seller/products');
                    }
        }
        //Delete Product
        public function Delete()
        {
                $id =$this->input->get('id');
                $delete=$this->ProductModel->Delete($id);
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
            redirect('seller/Productcontroller/Product');
        }

    }

?>