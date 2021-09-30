<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Feedbacks</h4>
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
                    <h3 class="card-title text-uppercase font-medium font-18">Feedbacks Details</h3>
                    <?php
                        $i=1;
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Person Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Subject</th>";
                        echo "<th>Message</th>";
                        echo "<th>Order Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($result as $row)
                        {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row->name."</td>";
                            echo "<td>".$row->email."</td>";
                            echo "<td>".$row->subject."</td>";
                            echo "<td>".$row->message."</td>";

                            // For Edit & Delete

                            // echo "<td><a class='btn btn-primary' href=".base_url('ProductController/Edit?id='.$row->Id.'').">Edit </a>
                            // <a href=".base_url('ProductController/Delete?id='.$row->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                    
                            // For Deleting Product Only
                            // if($row->status=='pending')
                            // {
                            //     echo "<td><a href=".base_url('OrderController/approve?id='.$row->id.'')." class='btn btn-primary'> approve</a>
                            //     <a href=".base_url('OrderController/delete?id='.$row->id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                            // }
                            echo "<td><a href=".base_url('admin/reply?id='.$row->id.'')." class='btn btn-secondary'> Reply</a></td>";
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