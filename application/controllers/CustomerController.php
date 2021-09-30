<?php

class CustomerController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer/AccountModel');
        $this->load->helper('url');
        $this->load->library('cart');
    }
    public function index()
    {
        $this->load->model('ProductModel');
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $this->ProductModel->add_visits($visitor_ip);
        $this->load->model('CategoryModel');
        $data['categories']=$this->CategoryModel->view();
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $data['products']=$this->ProductModel->view();
        $data['newprods']=$this->ProductModel->vieworder();
        $this->load->model('CategoryModel');
        $data['category']=$this->CategoryModel->view();
        $this->load->model('ReviewModel');
        $data['reviews']=$this->ReviewModel->viewr();
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/home', $data);
        $this->load->view('customerTemplate/footer');
    }
    public function cart()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        else{
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $id=$this->session->userdata('customerid');
            $this->load->model('WishModel');
            $items=$this->WishModel->view($id);
            $data['num']=$items->conn_id->affected_rows;
            $data['cart']=$this->cart->contents();
            $this->load->view('customerTemplate/header', $data);
            $this->load->view('customerTemplate/cart', $data);
            $this->load->view('customerTemplate/footer');
        }
    }
    public function about()
    {
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $id=$this->session->userdata('customerid');
            $this->load->model('WishModel');
            $items=$this->WishModel->view($id);
            $data['num']=$items->conn_id->affected_rows;
            $data['cart']=$this->cart->contents();
            $this->load->view('customerTemplate/header', $data);
            $this->load->view('customerTemplate/about', $data);
            $this->load->view('customerTemplate/footer');
    }
    public function gallery()
    {
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $id=$this->session->userdata('customerid');
            $this->load->model('WishModel');
            $items=$this->WishModel->view($id);
            $data['num']=$items->conn_id->affected_rows;
            $data['cart']=$this->cart->contents();
            $this->load->view('customerTemplate/header', $data);
            $this->load->view('customerTemplate/gallery', $data);
            $this->load->view('customerTemplate/footer');
    }
    public function checkout()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        else{
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $id=$this->session->userdata('customerid');
            $this->load->model('WishModel');
            $items=$this->WishModel->view($id);
            $data['num']=$items->conn_id->affected_rows;
            $contents= file_get_contents('../eshop/assets/data.json');
            $data['countries']=json_decode($contents);
            $custom= $this->session->userdata('customerid');
            $data['result']=$this->AccountModel->viewcustom($custom);
            $this->load->view('customerTemplate/header', $data);
            $this->load->view('customerTemplate/checkout', $data);
            $this->load->view('customerTemplate/footer');
        }
    }
    public function contact()
    {
        $this->load->model('CategoryModel');
        $data['categories']=$this->CategoryModel->view();
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/contact', $data);
        $this->load->view('customerTemplate/footer');
    }
    public function account()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        else{
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $id=$this->session->userdata('customerid');
            $this->load->model('WishModel');
            $items=$this->WishModel->view($id);
            $data['num']=$items->conn_id->affected_rows;
            $this->load->model('OrderModel');
            $data['orders']=$this->OrderModel->getorder($id);
            $array=array();
            $arr=array();
            $arra=array();
            $i=0;
            $j=0;
            $k=0;
            foreach($data['orders'] as $order)
            {
                $order_id=$order->id;
                $details=$this->OrderModel->getdetail($order_id);
                $array[$i]=$details;
                $i++;
            }
            $data['details']=$array;
            foreach($array as $arr)
            {
                foreach($arr as $value)
                {
                    $pro_id=$value->product_id;
                    $products=$this->OrderModel->getpro($pro_id);
                    // print_r($products);
                    $arr[$j]=$products;
                    $j++;
                }
                $arra[$k]=$arr;
                $k++;
            }
            $data['products']=$arra;
            $custom= $this->session->userdata('customerid');
            $data['result']=$this->AccountModel->viewcustom($custom);
            $this->load->view('customerTemplate/header', $data);
            $this->load->view('customerTemplate/myAccount', $data);
            $this->load->view('customerTemplate/footer');
        }
    }
    public function productdetail()
    {
        $this->load->model('CategoryModel');
        $data['categories']=$this->CategoryModel->view();
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $id=$this->input->get('id');
        $this->load->model('ProductModel');
        $data['products']=$this->ProductModel->Edit($id);
        foreach($data['products'] as $pro)
        {
            $sellid=$pro->supplier_FID;
        }
        $data['related']=$this->ProductModel->relatedpro($sellid);
        $this->load->model('ReviewModel');
        $reviews=$this->ReviewModel->view($id);
        $data['number']=$reviews->conn_id->affected_rows;
        $data['reviews']=$reviews->result();
        $page=1;
        $data['feature']=$this->ProductModel->featured($page);
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/productDetail', $data);
        $this->load->view('customerTemplate/footer');
    }
    public function productlist()
    {
        $page=$this->input->get('page');
        if($page=='')
        {
            $page=1;
        }
        $range=$this->input->get('range');
        $filter=$this->input->get('filter');
        $category=$this->input->get('category');
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $this->load->model('ReviewModel');
        $data['reviews']=$this->ReviewModel->viewr();
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $data['feature']=$this->ProductModel->featured($page);
        $data['categories']=$this->CategoryModel->view();
        if($category=='')
        {
            if($range=='')
            {
                if($filter=='')
                {
                    $data['products']=$this->ProductModel->viewlist($page);
                }
                elseif($filter=='new')
                {
                    $data['products']=$this->ProductModel->vieworder($page);
                }
                elseif($filter=='feature')
                {
                    $data['products']=$this->ProductModel->featured($page);
                }
                elseif($filter=='selling')
                {

                    $sellingpro=$this->ProductModel->bestsell();
                    $products=$this->ProductModel->view();
                    $i=0;
                    foreach($products as $product)
                    {
                        foreach($sellingpro as $sell)
                        {
                            if($sell->product_id==$product->Id)
                            {
                                $array[$i]=$product;
                                $i++;
                            }
                        }
                    }
                    $data['products']=$array;
                }
            }
            elseif($range==1)
            {
                $products=$this->ProductModel->view();
                $i=0;
                $array=array();
                foreach($products as $product)
                {
                    if($product->SalePrice<51)
                    $array[$i]=$product;
                    $i++;
                }
                $data['products']=$array;
            }
            elseif($range==50)
            {
                $products=$this->ProductModel->view();
                $i=0;
                $array=array();
                foreach($products as $product)
                {
                    if($product->SalePrice>50 && $product->SalePrice<101)
                    $array[$i]=$product;
                    $i++;
                }
                $data['products']=$array;
            }
            elseif($range==100)
            {
                $products=$this->ProductModel->view();
                $i=0;
                $array=array();
                foreach($products as $product)
                {
                    if($product->SalePrice>100 && $product->SalePrice<201)
                    $array[$i]=$product;
                    $i++;
                }
                $data['products']=$array;
            }
            elseif($range==200)
            {
                $products=$this->ProductModel->view();
                $i=0;
                $array=array();
                foreach($products as $product)
                {
                    if($product->SalePrice>200 && $product->SalePrice<501)
                    $array[$i]=$product;
                    $i++;
                }
                $data['products']=$array;
            }
            elseif($range==500)
            {
                $products=$this->ProductModel->view();
                $i=0;
                $array=array();
                foreach($products as $product)
                {
                    if($product->SalePrice>500 && $product->SalePrice<1001)
                    $array[$i]=$product;
                    $i++;
                }
                $data['products']=$array;
            }
            elseif($range==1000)
            {
                $products=$this->ProductModel->view();
                $i=0;
                $array=array();
                foreach($products as $product)
                {
                    if($product->SalePrice>1000)
                    $array[$i]=$product;
                    $i++;
                }
                $data['products']=$array;
            }
        }
        else{
            $data['products']=$this->ProductModel->viewcat($category, $page);
        }
        $data['pages']=$this->ProductModel->count();
        if($page==1)
            {
                $data['previous']=$page;    
            }
            else
            {
                $data['previous']=$page-1;
            }
            if($page==$data['pages'])
            {
                $data['next']=$page;
            }
            else
            {
                $data['next']=$page+1;
            }
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/productList', $data);
        $this->load->view('customerTemplate/footer');
    }
    public function productsearch()
    {
        $page=$this->input->get('page');
        if($page=='')
        {
            $page=1;
        }
        $range=$this->input->get('range');
        $filter=$this->input->get('filter');
        $category=$this->input->get('category');
        $search=$this->input->post('search');
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $this->load->model('ReviewModel');
        $data['reviews']=$this->ReviewModel->viewr();
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $data['feature']=$this->ProductModel->featured($page);
        $data['categories']=$this->CategoryModel->view();
        $data['products']=$this->ProductModel->search($search,$page);
        $data['pages']=$this->ProductModel->countsearch($search);
        if($page==1)
            {
                $data['previous']=$page;    
            }
            else
            {
                $data['previous']=$page-1;
            }
            if($page==$data['pages'])
            {
                $data['next']=$page;
            }
            else
            {
                $data['next']=$page+1;
            }
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/productList', $data);
        $this->load->view('customerTemplate/footer');
    }
    public function wishlist()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        else{
            $this->load->model('CategoryModel');
            $data['categories']=$this->CategoryModel->view();
            $id=$this->session->userdata('customerid');
            $this->load->model('WishModel');
            $items=$this->WishModel->view($id);
            $data['items']=$items->result();
            $data['num']=$items->conn_id->affected_rows;
            $this->load->model('ProductModel');
            $data['products']=$this->ProductModel->view();
            // print_r($data['items']);
            // exit();
            $this->load->view('customerTemplate/header', $data);
            $this->load->view('customerTemplate/wishlist', $data);
            $this->load->view('customerTemplate/footer');
        }
    }

    public function addtocart()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        $id=$this->input->get('id');
        $qty=$this->input->get('qty');
        if($qty=='')
        {
            $qty=1;
        }
        $this->load->model('ProductModel');
        $products=$this->ProductModel->Edit($id);
        foreach($products as $product)
        {
            if(!empty($this->cart->contents()))
            {
                $i=0;
                foreach($this->cart->contents() as $cart)
                {
                    if($i<1)
                    {
                        if($cart['id']==$product->Id)
                        {
                            if($cart['qty']<$product->Quantity)
                            {
                                $data=array(
                                    'id' => $product->Id,
                                    'qty' => $qty,
                                    'price' => $product->SalePrice,
                                    'name' => $product->Name,
                                    'options' => array('image'=>$product->Image)
                                );
                                $this->cart->insert($data);
                                $this->session->set_userdata('success', 'Product Added to Cart Successfully');
                                echo "<script>alert('Added to Cart Successfully');</script>";
                                // print_r($this->cart->contents());
                                // exit();
                            }
                            else
                            {
                                $this->session->set_userdata('error', 'No More Items in Stock');
                                echo "No More Items in Stock";
                            }
                        }
                        else
                        {
                            $data=array(
                                'id' => $product->Id,
                                'qty' => $qty,
                                'price' => $product->SalePrice,
                                'name' => $product->Name,
                                'options' => array('image'=>$product->Image)
                            );
                            $this->cart->insert($data);
                            $this->session->set_userdata('success', 'Product Added to Cart Successfully');
                        }
                    }
                }
            }
            else
            {
                $data=array(
                    'id' => $product->Id,
                    'qty' => $qty,
                    'price' => $product->SalePrice,
                    'name' => $product->Name,
                    'options' => array('image'=>$product->Image)
                );
                $this->cart->insert($data);
                $this->session->set_userdata('success', 'Product Added to Cart Successfully');
            }
            // return redirect('product-list');
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
            // header("location:javascript://history.go(-1)");
            // header('Location: '.$_SERVER['PHP_SELF']);
        }

    }

    public function buynow()
    {
        $id=$this->input->get('id');
        $qty=$this->input->get('qty');
        // echo $id;
        // exit();
        if($qty=='')
        {
            $qty=1;
        }
        // print_r($cart=$this->cart->get_item('e63bf758abeb2725d0129e5066a5c634'));
        // exit();
        $this->load->model('ProductModel');
        $products=$this->ProductModel->Edit($id);
        foreach($products as $product)
        {
            if(!empty($this->cart->contents()))
            {
                $i=0;
                foreach($this->cart->contents() as $cart)
                {
                    if($i<1)
                    {
                        if($cart['id']==$product->Id)
                        {
                            if($cart['qty']<$product->Quantity)
                            {
                                $data=array(
                                    'id' => $product->Id,
                                    'qty' => $qty,
                                    'price' => $product->SalePrice,
                                    'name' => $product->Name,
                                    'options' => array('image'=>$product->Image)
                                );
                                $this->cart->insert($data);
                                // $this->session->unset_userdata($product->Name, $product);
                                $this->session->set_userdata('success', 'Product Added to Cart Successfully');
                                echo "<script>alert('Added to Cart Successfully');</script>";
                                // print_r($this->cart->contents());
                                // exit();
                            }
                            else
                            {
                                $this->session->set_userdata('error', 'No More Items in Stock');
                                echo "No More Items in Stock";
                            }
                        }
                        else
                        {
                            $data=array(
                                'id' => $product->Id,
                                'qty' => $qty,
                                'price' => $product->SalePrice,
                                'name' => $product->Name,
                                'options' => array('image'=>$product->Image)
                            );
                            $this->cart->insert($data);
                            $this->session->set_userdata('success', 'Product Added to Cart Successfully');
                        }
                        $i++;
                    }
                }
            }
            else
            {
                $data=array(
                    'id' => $product->Id,
                    'qty' => $qty,
                    'price' => $product->SalePrice,
                    'name' => $product->Name,
                    'options' => array('image'=>$product->Image)
                );
                $this->cart->insert($data);
                $this->session->set_userdata('success', 'Product Added to Cart Successfully');
            }
            return redirect('cart');
            // header("location:javascript://history.go(-1)");
        }

    }

    public function removeitem()
    {
        $id=$this->input->get('id');
        $rowid=$this->input->get('rowid');
        $this->cart->remove($rowid);

        // $this->load->model('ProductModel');
        // $products=$this->ProductModel->Edit($id);
        // foreach($products as $product)
        // {
            $this->session->set_userdata('success','Item Deleted Successfully!');

        // }
        return redirect('cart');

    }

    public function decreaseqty()
    {
        $rowid=$this->input->post('rowid');
        $qty=$this->input->post('qty');
        $cart=$this->cart->get_item($rowid);
        $this->load->model('ProductModel');
        $products=$this->ProductModel->view();
        foreach($products as $product)
        {
                if($cart['id']==$product->Id)
                {
                    if($qty<=$product->Quantity)
                    {
                        $data=array(
                            'rowid' => $rowid,
                            'qty' => $qty
                        );
                        $this->cart->update($data);
                        $this->session->set_userdata('success','Cart Updated Successfully!');
                    }
                }
        }
        print_r($this->cart->contents());
    }

    public function addtowishlist()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        $proid=$this->input->get('id');
        $userid=$this->session->userdata('customerid');
        // echo $userid;
        $date=date("d/m/y");
        $this->load->model('WishModel');
        $data=array(
            'user_id' => $userid,
            'product_id' => $proid,
            'date_added' => $date
        );
        $insert=$this->WishModel->insert($data);
        if($insert)
        {
            $this->session->set_userdata('success','Product Added to Wishlist Successfully!');
            echo "Added to wishlist Successfully";
        }
        else
        {
            $this->session->set_userdata('error','An Error Occured!');
            echo "An error Occured";
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        // header("location:javascript://history.go(-1)");
    }

    public function removewishlist()
    {
        $id=$this->input->get('id');
        $this->load->model('WishModel');
        $delete=$this->WishModel->delete($id);
        if($delete)
        {
            $this->session->set_userdata('success','Product Deleted From Wishlist Successfully!');
            echo "Deleted Successfully";
        }
        else
        {
            $this->session->set_userdata('error','An Error Occured!');
            echo "Error Occured";
        }
        return redirect('wishlist');

    }

    public function reviewsubmit()
    {
        if(!$this->session->userdata('customer'))
        {
            return redirect('login');
        }
        $prod_id=$this->input->get('id');
        $user_id=$this->session->userdata('customerid');
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $review=$this->input->post('review');
        $rate=$this->input->post('rating');
        $this->load->model('ReviewModel');
        $date=date('d/m/y');
        $data=array(
            'customer_id' => $user_id,
            'name' => $name, 
            'email' => $email,
            'review' => $review,
            'stars' => $rate,
            'product_id' => $prod_id,
            'date' => $date
        );
        $insert=$this->ReviewModel->insert($data);
        if($insert)
        {
            $this->session->set_userdata('success','Review Shared Successfully!');
            echo "Review Shared Successfully";
        }
        else
        {
            $this->session->set_userdata('error','An Error Occured While Sharing your Review!');
            echo "An error Occured";
        }
        return redirect('product-details?id='.$prod_id);
    }

    public function editprofile()
    {
        $id=$this->input->get('id');
        $fname= $this->input->post('fname');
        $lname= $this->input->post('lname');
        $email= $this->input->post('email');
        $mobile= $this->input->post('mobile');
        $address= $this->input->post('address');
        $this->load->model("LoginModel");
        $update=$this->LoginModel->updateprofile($id,$fname, $lname, $email, $mobile, $address);
        if($update)
        {
            $this->session->set_userdata('success','Your Account has been Updated Successfully!');
            echo "Successfully Updated";
        }
        else
        {
            $this->session->set_userdata('error','An Error Occured!');
            echo "An error Occured";
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function editcredential()
    {
        $id=$this->input->get('id');
        $curpass= $this->input->post('curpass');
        $pass= $this->input->post('pass');
        $cpass= $this->input->post('cpass');
        $this->load->model("LoginModel");
        if($pass==$cpass)
        {
            $uin=$this->LoginModel->changepass($id);
            $curpass=md5($curpass);
            if($curpass==$uin)
            {
                $pass=md5($pass);
                $update=$this->LoginModel->newpassword($id, $pass);
                if($update)
                {
                    $this->session->set_userdata('success','Your AccountPassword Changed Successfully!');
                    echo "Password Has Been Changed successfully";
                }
                else
                {
                    $this->session->set_userdata('error','An Error Occured While Changing Password!');
                    echo "An Error Occured";
                }
            }
            else
            {
                $this->session->set_userdata('error','Please ensure Your Current Password & Try Again!');
                echo "Current Password is False";
            }
        }
        else
        {
            $this->session->set_userdata('error','New Password Does Not Match!');
            echo "Passwords Does Not Match";
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");

    }

    public function placeorder()
    {
        $id=$this->input->post('cid');
        $payment=$this->input->post('payment');
        if($payment=="Card Payment"){
            if($this->session->userdata('paid'))
            {
                $total=$this->cart->total();
                $fname=$this->input->post('fname');
                $lname=$this->input->post('lname');
                $email=$this->input->post('email');
                $address=$this->input->post('address');
                $mobile=$this->input->post('mobile');
                $date=date('d/m/y');
                $this->load->model('OrderModel');
                $data=array(
                    'name' => $fname.' '.$lname,
                    'email' => $email,
                    'address' => $address,
                    'mobile' =>$mobile,
                    'customer_fid' => $id,
                    'payment_mode' =>$payment,
                    'total_amount' => '$'.$this->cart->total(),
                    'status' => 'pending',
                    'date' => $date
                );
                $insert=$this->OrderModel->insert($data);
                if($insert)
                {
                            require 'assets/PHPMailerAutoload.php';
                            require 'assets/credential.php';
                            $mail = new PHPMailer();

                            //$mail->SMTPDebug = 4;                               // Enable verbose debug output

                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = EMAIL;                 // SMTP username
                            $mail->Password = PASSWORD;                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to
                            $mail->setFrom(EMAIL, 'E-SHOP e-commerce Store');
                            $mail->addAddress($email);     // Add a recipient               // Name is optional
                            $mail->addReplyTo(EMAIL);
                            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = 'Your Order has been Placed!';
                            $mail->Body    = "<h2>Thanks for Shopping on E-SHOP!</h2><br>
                            Your order is on its way. Check your account for order status and let us knon whenever you recieve your order.
                            <h3>Order Details:</h3><br>
                            Order Date:$date,<br>
                            Order Amount:$$total,<br>
                            Payment Mode:$payment,<br>
                            Check your Order Status Here: <a href='http://localhost/eshop/user-account'>E-SHOP Account</a>";
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            if(!$mail->send()) {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }
                            else {
                                echo 'Message has been sent';
                            }
                    foreach($this->cart->contents() as $row)
                    {
                        $prodid=$row['id'];
                        $this->load->model('ProductModel');
                        $products=$this->ProductModel->Edit($prodid);
                        foreach($products as $product)
                        {
                            $quantity=$product->Quantity-$row['qty'];
                        }
                        $this->ProductModel->adjustqty($quantity, $prodid);
                        $data=array(
                            'product_id' => $row['id'],
                            'quantity' =>$row['qty'],
                            'order_fid' => $insert
                        );
                        $ins=$this->OrderModel->insertdet($data);
                        if($ins)
                        {
                            $this->session->unset_userdata('paid');
                            $this->cart->destroy();
                            $this->session->set_userdata('success','Your Order Has Been Placed Successfully!');
                            echo "Successfully Done Placing Order";
                        }
                        else
                        {
                            $this->session->set_userdata('error','OrderDetails are Incomplete!');
                            echo "Order details are not complete";
                        }
                    }
                    return redirect('doneorder');
                }
                else
                {
                    $this->session->set_userdata('error','Unknown Error Occured While Placing Order! Please Try again later');
                    echo "An error occured while Placing your order";
                }
            }
            else
            {
                $this->session->set_userdata('error','Please Complete Card Payment Process!');
                return redirect('payment');
                echo "Please Select a payment method";
            }
        }
        else {
            $total=$this->cart->total();
                $fname=$this->input->post('fname');
                $lname=$this->input->post('lname');
                $email=$this->input->post('email');
                $address=$this->input->post('address');
                $mobile=$this->input->post('mobile');
                $date=date('d/m/y');
                $this->load->model('OrderModel');
                $data=array(
                    'name' => $fname.' '.$lname,
                    'email' => $email,
                    'address' => $address,
                    'mobile' =>$mobile,
                    'customer_fid' => $id,
                    'payment_mode' =>$payment,
                    'total_amount' => '$'.$this->cart->total(),
                    'status' => 'pending',
                    'date' => $date
                );
                $insert=$this->OrderModel->insert($data);
                if($insert)
                {
                            require 'assets/PHPMailerAutoload.php';
                            require 'assets/credential.php';
                            $mail = new PHPMailer();

                            //$mail->SMTPDebug = 4;                               // Enable verbose debug output

                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = EMAIL;                 // SMTP username
                            $mail->Password = PASSWORD;                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to
                            $mail->setFrom(EMAIL, 'E-SHOP e-commerce Store');
                            $mail->addAddress($email);     // Add a recipient               // Name is optional
                            $mail->addReplyTo(EMAIL);
                            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = 'Your Order has been Placed!';
                            $mail->Body    = "<h2>Thanks for Shopping on E-SHOP!</h2><br>
                            Your order is on its way. Check your account for order status and let us knon whenever you recieve your order.
                            <h3>Order Details:</h3><br>
                            Order Date:$date,<br>
                            Order Amount:$$total,<br>
                            Payment Mode:$payment,<br>
                            Check your Order Status Here: <a href='http://localhost/eshop/user-account'>E-SHOP Account</a>";
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            if(!$mail->send()) {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }
                            else {
                                echo 'Message has been sent';
                            }
                    foreach($this->cart->contents() as $row)
                    {
                        $prodid=$row['id'];
                        $this->load->model('ProductModel');
                        $products=$this->ProductModel->Edit($prodid);
                        foreach($products as $product)
                        {
                            $quantity=$product->Quantity-$row['qty'];
                        }
                        $this->ProductModel->adjustqty($quantity, $prodid);
                        $data=array(
                            'product_id' => $row['id'],
                            'quantity' =>$row['qty'],
                            'order_fid' => $insert
                        );
                        $ins=$this->OrderModel->insertdet($data);
                        if($ins)
                        {
                            $this->session->unset_userdata('paid');
                            $this->cart->destroy();
                            $this->session->set_userdata('success','Your Order Has Been Placed Successfully!');
                            echo "Successfully Done Placing Order";
                        }
                        else
                        {
                            $this->session->set_userdata('error','OrderDetails are Incomplete!');
                            echo "Order details are not complete";
                        }
                    }
                    return redirect('doneorder');
                }
                else
                {
                    $this->session->set_userdata('error','Unknown Error Occured While Placing Order! Please Try again later');
                    echo "An error occured while Placing your order";
                }
        }
    }

    public function cardpay()
    {
        require('assets/config.php');
        // return redirect('checkout');
        if(isset($_POST['stripeToken']))
        {

            \stripe\stripe::setVerifySslCerts(false);


            $token=$_POST['stripeToken'];

            $data=\stripe\charge::create(array(
                'amount'=>$this->cart->total()*100,
                'currency'=>'usd',
                'description' => 'E-store Item purchase Payment',
                'source' => $token,
                // 'billing_details'=> array('phone' => '03365131959')
            ));
            $this->session->set_userdata('success','Order Amount Has been Paid through your bank Card, Confirm your Order!');
            $this->session->set_userdata('paid', true);
            return redirect('checkout');
            
        }
    }
    public function payment()
    {
        $this->load->model('CategoryModel');
        $data['categories']=$this->CategoryModel->view();
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/payment', $data);
        $this->load->view('customerTemplate/footer');
        
    }

    public function doneorder()
    {
        $id=$this->session->userdata('customerid');
        $this->load->model('WishModel');
        $items=$this->WishModel->view($id);
        $data['num']=$items->conn_id->affected_rows;
        $this->load->view('customerTemplate/header', $data);
        $this->load->view('customerTemplate/doneorder', $data);
        $this->load->view('customerTemplate/footer');
        
    }

    public function newsletter()
    {
        $email=$this->input->post('email');
        $this->load->Model('WishModel');
        $data=array(
            'email' => $email
        );
        $insert=$this->WishModel->newsletter($data);
        if($insert)
        {
            $this->session->set_userdata('success','You have Successfully Subscribed to Our Newsletter!');
            echo "You have Successfully Subscribed to Our Newsletter";
        }
        else
        {
            $this->session->set_userdata('error','You Can\'t Subscribe to Our Newsletter! Please Try again Later');
            echo "Please Try again";
        }
        return redirect('home');
    }

    public function newcontact()
    {
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $subject=$this->input->post('subject');
        $msg=$this->input->post('msg');
        $data=array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $msg
        );
        $this->load->Model('WishModel');
        $insert=$this->WishModel->comment($data);
        if($insert)
        {
            $this->session->set_userdata('success','Your Feedback have been recieved! We\'ll review and reply to your Feedback.');
            echo "Your feedback has been recieved";
        }
        else
        {
            $this->session->set_userdata('error','Error While Sending Your Feedback!');
            echo "Error Occured while sending your feedback";
        }
        return redirect('contact-us');
    }

    public function deleteorder()
    {
                $id =$this->input->get('id');
                $this->load->model('OrderModel');
                $this->load->model('ProductModel');
                $orders=$this->OrderModel->prodqty($id);
                $products=$this->OrderModel->viewprod();
                foreach($orders as $order)
                {
                    foreach($products as $product)
                    {
                        if($product->Id==$order->product_id)
                        {
                            $qty=$product->Quantity+$order->quantity;
                            $prodid=$product->Id;
                            $adjusted=$this->ProductModel->adjustqty($qty, $prodid);
                        }
                    }
                }
                $delete=$this->OrderModel->deleteorder($id);
                if($delete)
                {
                    $this->session->set_userdata('success','Your Order have been cancelled!');
                    echo '<script type="text/javascript">';
                    echo "alert('Page Has Been Deleted Successfully.')";
                    echo '</script>';
                }
                else
                
                {
                    $this->session->set_userdata('error','Unknown Error Occured While Cancelling Your Order!');
                    echo '<script type="text/javascript">';
                    echo "alert('An Error Occured.')";
                    echo '</script>';
                }
            redirect('user-account');
    }

    public function removeorder()
    {
                $id =$this->input->get('id');
                $this->load->model('OrderModel');
                $delete=$this->OrderModel->removeorder($id);
                if($delete)
            {
                $this->session->set_userdata('success','Order Removed From List Successfully!');
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
            }
                else
                
            {
                $this->session->set_userdata('error','Unknown Error Occured While Removing Order from List!');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
            redirect('user-account');
    }

    public function recieveorder()
    {
                $id =$this->input->get('id');
                $this->load->model('OrderModel');
                $update=$this->OrderModel->recieveorder($id);
                if($update)
            {
                $this->session->set_userdata('success','Thanks For Shopping Here!');
                echo '<script type="text/javascript">';
                echo "alert('Page Has Been Deleted Successfully.')";
                echo '</script>';
            }
                else
                
            {
                $this->session->set_userdata('error','Unknown error occured!');
                echo '<script type="text/javascript">';
                echo "alert('An Error Occured.')";
                echo '</script>';
            }
            redirect('user-account');
    }
}


?>