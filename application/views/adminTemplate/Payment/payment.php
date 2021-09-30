<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Transection Details</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
                <!-- /.col-lg-12 -->
    </div>
    <?php if($responce = $this->session->userdata('success')){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <?php echo $responce;?>
                    </div>
                    <?=$this->session->unset_userdata('success')?>
                </div>
            </div>
        <?php }
        elseif($responce = $this->session->userdata('error')){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <?php echo $responce;?>
                    </div>
                    <?=$this->session->unset_userdata('error')?>
                </div>
            </div> 
            <?php
            }
            ?>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
    <div class="container-fluid">
                <!--Show Pages-->
        <div class="row">
            <div class="col-md-12">
                <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('PaymentController/newpage')?>">Add New Payment</a>
            </div>
        </div>
        <div class="row">
            <div class="card card-data">
                <div class="card-body">
                    <h3 class="card-title text-uppercase font-medium font-18">Payment Details</h3>
                    <?php
                        $i=1;
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Seller Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Order ID</th>";
                        echo "<th>Total Amount</th>";
                        echo "<th>Order Status</th>";
                        echo "<th>Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($result as $row)
                        {
                            foreach($details as $detail)
                            {
                                if($row->id==$detail->order_fid)
                                {
                                    foreach($products as $product)
                                    {
                                        if($product->Id==$detail->product_id)
                                        {
                                            foreach($sellers as $seller)
                                            {
                                                if($seller->Id==$product->supplier_FID)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$i."</td>";
                                                    echo "<td>".$seller->Username."</td>";
                                                    echo "<td>".$seller->Email."</td>";
                                                    echo "<td>".$row->id."</td>";
                                                    echo "<td>".$product->SalePrice*$detail->quantity."</td>";
                                                    echo "<td>".$row->status."</td>";
                                                    echo "<td><a class='btn btn-primary' href=".base_url('PaymentController/Edit?id='.$row->id.'').">Edit </a>
                                                    <a href=".base_url('PaymentController/Delete?id='.$row->id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                                    $i++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        echo "</tbody>";
                        echo "</table>";
                    ?>

                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="card card-data">
                <div class="card-body">
                    <h3 class="card-title text-uppercase font-medium font-18">Payment Details</h3>
                    <?php
                        $i=1;
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Bank Name</th>";
                        echo "<th>Branch Code</th>";
                        echo "<th>Branch Address</th>";
                        echo "<th>Account No.</th>";
                        echo "<th>IBAN No.</th>";
                        echo "<th>Seller ID</th>";
                        echo "<th>Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($result as $row)
                        {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row->BankName."</td>";
                            echo "<td>".$row->BranchCode."</td>";
                            echo "<td>".$row->BranchAddress."</td>";
                            echo "<td>".$row->AccountNumber."</td>";
                            echo "<td>".$row->IBANNumber."</td>";
                            echo "<td>".$row->PersonId."</td>";
                            echo "<td><a class='btn btn-primary' href=".base_url('PaymentController/Edit?id='.$row->Id.'').">Edit </a>
                            <a href=".base_url('PaymentController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                            $i++;
                        }
                        echo "</tbody>";
                        echo "</table>";
                    ?>

                </div>
            </div>
        </div> -->
    </div>
</div>