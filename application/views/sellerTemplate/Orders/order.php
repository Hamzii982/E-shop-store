<div class="content">
    <div class="container-fluid">
        <?php
            if(!empty($details))
            {
        ?>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">My Orders</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <?php
                                $i=1;
                                echo "<thead class='text-primary'>";
                                echo "<tr>";
                                echo "<th>Sr No.</th>";
                                echo "<th>Product Image</th>";
                                echo "<th>Product Name</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Total Bill</th>";
                                echo "<th>Customer Name</th>";
                                echo "<th>Order Date</th>";
                                echo "<th>Delivery Address</th>";
                                echo "<th>Payment Method</th>";
                                echo "<th>Customer Mobile No.</th>";
                                echo "<th>Order Actions</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($result as $row)
                                {
                                    foreach($orders as $order)
                                    {
                                        if($order->product_id==$row->Id)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td><img src='$row->Image' height='80px' width='80px'></td>";
                                            echo "<td>".$row->Name."</td>";
                                            echo "<td>".$order->quantity."</td>";
                                            echo "<td>".$order->quantity*$row->SalePrice."</td>";
                                            foreach($details as $detail)
                                            {
                                                if($detail->id==$order->order_fid)
                                                {
                                                    echo "<td>".$detail->name."</td>";
                                                    echo "<td>".$detail->date."</td>";
                                                    echo "<td>".$detail->address."</td>";
                                                    echo "<td>".$detail->payment_mode."</td>";
                                                    echo "<td>".$detail->mobile."</td>";
                                                    if($detail->status=='approved' && $order->status!=1)
                                                    {    
                                                        echo "<td>
                                                        <a href=".base_url('seller/OrderController/deliver?id='.$order->id.'&order='.$detail->id)." name='deliver' id='deliver' class='btn btn-success'> Deliver</a></td>";
                                                    }
                                                    if($order->status==1 && $detail->status=='approved')
                                                    {
                                                        echo "<td>
                                                        <a href='' style='opacity:0.7;' class='btn btn-success'> In Queue</a></td>";
                                                    }
                                                    elseif($detail->status=='delivered')
                                                    {
                                                        echo "<td>
                                                        <a href='' style='opacity:0.7;' class='btn btn-danger'> Delivered</a></td>";
                                                    }
                                                    elseif($detail->status=='pending')
                                                    {
                                                        echo "<td>
                                                        <a href='' style='opacity:0.7;' class='btn btn-primary'> pending</a></td>";
                                                    }
                                                    elseif($detail->status=='done')
                                                    {
                                                        echo "<td>
                                                        <a href='' style='opacity:0.7;' class='btn btn-success'> Completed</a></td>";
                                                    }
                                                }
                                            }
                                            $i++;
                                        }
                                    }
                                }
                                echo "</tbody>";
                            ?>
                        </table>
                    </div>
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
                <h3>No Orders Recieved</h3>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
