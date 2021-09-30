<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Products List</h4>
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
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
    <div class="container-fluid">
                <!--Show Pages-->        
        <div class="row">
            <div class="card card-data">
                <div class="card-body">
                    <h3 class="card-title text-uppercase font-medium font-18">Products Details</h3>
                    <?php
                        $i=1;
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Product Image</th>";
                        echo "<th>Product Name</th>";
                        echo "<th>Product Description</th>";
                        echo "<th>Category</th>";
                        echo "<th>Purchase Price</th>";
                        echo "<th>Sale Price</th>";
                        echo "<th>Seller ID</th>";
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
                            echo "<td>".$row->supplier_FID."</td>";

                            // For Edit & Delete

                            // echo "<td><a class='btn btn-primary' href=".base_url('ProductController/Edit?id='.$row->Id.'').">Edit </a>
                            // <a href=".base_url('ProductController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                            
                            // For Deleting Product Only
                            if($row->featured==0)
                            {
                                echo "<td><a href=".base_url('ProductController/feature?id='.$row->Id.'')." name='feature' id='feature' class='btn btn-primary'> Feature</a>
                                <a href=".base_url('ProductController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                            }
                            else{
                                echo "<td><a href=".base_url('ProductController/unfeature?id='.$row->Id.'')." name='feature' id='feature' class='btn btn-secondary'> Unfeature</a>
                                <a href=".base_url('ProductController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                            }
                                $i++;
                        }
                        echo "</tbody>";
                        echo "</table>";
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>