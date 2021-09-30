<div class="content">
        <div class="container-fluid">
        <?php
        if(!$result==null)
        {
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">Payment Details</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                    <?php
                        $i=1;
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Order Id</th>";
                        echo "<th>Total Payment</th>";
                        echo "<th>Order Date</th>";
                        echo "<th>Payment Method</th>";
                        echo "<th>Transection</th>";
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
                                        if($product->supplier_FID==$this->session->userdata('selid') AND $product->Id==$detail->product_id)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$row->id."</td>";
                                            echo "<td>".$product->SalePrice*$detail->quantity."</td>";
                                            echo "<td>".$row->date."</td>";
                                            echo "<td>".$row->payment_mode."</td>";
                                            if($row->status=='done'){
                                                echo "<td>Paid</td>";    
                                            }
                                            else{
                                                echo "<td>Pending</td>";
                                            }
                                            // echo "<td><a class='btn btn-primary' href=".base_url('seller/PaymentController/Edit?id='.$row->Id.'').">Edit </a>
                                            // <a href=".base_url('seller/PaymentController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                            $i++;

                                        }
                                    }
                                }
                            }
                        }
                        echo "</tbody>";
                    ?>
                    </table>
                </div>
            </div>
        </div>
        <?php
        }
        else
        {
        ?>
        <div class="row">
            <div class="card maind" style="margin-left:20px; text-align:center; width:1050px; margin-top:30px;">
                <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('seller/Paymentcontroller/newpage')?>">Add Payment Details</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</div>