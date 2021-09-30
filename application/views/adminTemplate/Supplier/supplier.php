

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
             <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Supplier List</h4>
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!--Show Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('suppliercontroller/new')?>">Add New Supplier</a>
                    </div>
                </div>
                <div class="row">
                    <div class="card card-data">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase font-medium font-18">Suppliers</h3>
                            <?php
                                $i=1;
                                echo "<table class='table'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Sr No.</th>";
                                echo "<th>Supplier Name</th>";
                                echo "<th>Supplier Address</th>";
                                echo "<th>Supplier Phone No.</th>";
                                echo "<th>Actions</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($result as $value)
                                {
                                    echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$value->Name."</td>";
                                        echo "<td>".$value->Address."</td>";
                                        echo "<td>".$value->Phone."</td>";
                                        echo "<td><a class='btn btn-primary' href=".base_url('SupplierController/Edit?id='.$value->Id.'').">Edit </a>
                                        <a href=".base_url('SupplierController/Delete?id='.$value->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                $i++;
                                }
                                echo "</tbody>";
                                echo "</table>";

                            ?>
                        </div>
                    </div>
                </div>
            </div>