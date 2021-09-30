<div class="content">
        <div class="container-fluid">
        <?php
            if(!empty($result))
            {
        ?>
        <div class="row">
            <div class="col-md-12">
                <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('seller/productcontroller/newpage')?>">Add New Product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">Products Details</h3>
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
                        echo "<th>Product Description</th>";
                        echo "<th>Category</th>";
                        echo "<th>Purchase Price</th>";
                        echo "<th>Sale Price</th>";
                        echo "<th>Quntity</th>";
                        echo "<th>Product Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($result as $row)
                        {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td><img src='$row->Image' height='80px' width='80px'></td>";
                            echo "<td>".$row->Name."</td>";
                            echo "<td>".$row->Description."</td>";
                            echo "<td>".$row->Category."</td>";
                            echo "<td>".$row->PurchasePrice."</td>";
                            echo "<td>".$row->SalePrice."</td>";
                            echo "<td>".$row->Quantity."</td>";
                            echo "<td><a class='btn btn-primary' href=".base_url('seller/ProductController/Edit?id='.$row->Id.'').">Edit </a>
                            <a href=".base_url('seller/ProductController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                            $i++;
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
                <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('seller/productcontroller/newpage')?>">Add New Product</a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
</div>
