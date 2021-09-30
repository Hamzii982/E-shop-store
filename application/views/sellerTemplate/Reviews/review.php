<div class="content">
    <div class="container-fluid">
        <?php
            if(!empty($result))
            {
        ?>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">My Products Reviews</h3>
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
                                echo "<th>Person Name</th>";
                                echo "<th>Email</th>";
                                echo "<th>Review Stars</th>";
                                echo "<th>Review Details</th>";
                                echo "<th>Date</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($result as $row)
                                {
                                    foreach($reviews as $review)
                                    {
                                        if($review->product_id==$row->Id)
                                        {
                                            $j=0;
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td><img src='$row->Image' height='80px' width='80px'></td>";
                                            echo "<td>".$row->Name."</td>";
                                            echo "<td>".$review->name."</td>";
                                            echo "<td>".$review->email."</td>";
                                            echo "<td>";
                                            while($review->stars>$j)
                                            {
                                                echo "<i class='fa fa-star'></i>";
                                                $j++;
                                            }
                                            echo "</td>";
                                            echo "<td>".$review->review."</td>";
                                            echo "<td>".$review->date."</td>";
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
