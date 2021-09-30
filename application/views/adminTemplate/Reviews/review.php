<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Product Reviews</h4>
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
                    <h3 class="card-title text-uppercase font-medium font-18">Reviews Details</h3>
                    <?php
                        $i=1;
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Product Image</th>";
                        echo "<th>Product Name</th>";
                        echo "<th>Person Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Review Stars</th>";
                        echo "<th>Review Details</th>";
                        echo "<th>Date</th>";
                        echo "<th>Review Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($reviews as $review)
                        {
                            foreach($result as $row)
                            {
                                if($review->product_id==$row->Id)
                                {
                                    $j=0;
                                    echo "<tr>";
                                    echo "<td>".$i."</td>";
                                    echo "<td><img src=".$row->Image." height='80px' width='80px'></td>";
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

                                    // For Edit & Delete

                                    // echo "<td><a class='btn btn-primary' href=".base_url('ProductController/Edit?id='.$row->Id.'').">Edit </a>
                                    // <a href=".base_url('ProductController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                            
                                    // For Deleting Product Only
                            
                                    echo "<td><a href=".base_url('OrderController/deleterev?id='.$review->id.'')." class='btn btn-danger' '> Delete</a></td>";
                                    $i++;
                                }
                            }
                        }
                        echo "</tbody>";
                        echo "</table>";
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>