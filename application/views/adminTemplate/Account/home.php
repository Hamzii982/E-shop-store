<!-- 
<div class="main">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html> -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Accounts List</h4>
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!--Show Pages-->
                <div class="row">
                    <div class="card card-data">
                        <div class="card-body">
                            <h3 class="card-title">Seller Acoounts</h3>
                            <?php
                                $i=1;
                                echo "<table class='table'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Sr No.</th>";
                                echo "<th>Seller Name</th>";
                                echo "<th>Seller Email</th>";
                                echo "<th>Mobile No.</th>";
                                echo "<th>Address</th>";
                                echo "<th>Bank Name</th>";
                                echo "<th>Account No.</th>";
                                echo "<th>Branch Address</th>";
                                echo "<th>Actions</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($result as $value)
                                {
                                    if($value->Role=='Seller')
                                    {
                                    echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$value->Username."</td>";
                                        echo "<td>".$value->Email."</td>";
                                        echo "<td>".$value->Mobile."</td>";
                                        echo "<td>".$value->Address."</td>";
                                        foreach($banks as $bank)
                                        {
                                            // var_dump( $bank->PersonId);
                                            // echo "<br>";
                                            // var_dump( $value->Id);
                                            if($value->Id==$bank->PersonId)
                                            {
                                                echo "<td>".$bank->BankName."</td>";
                                                echo "<td>".$bank->AccountNumber."</td>";
                                                echo "<td>".$bank->BranchAddress."</td>";
                                            }
                                            // else
                                            // {
                                            //     echo "<td>N/A</td>";
                                            //     echo "<td>N/A</td>";
                                            //     echo "<td>N/A</td>";
                                            // }
                                        }
                                        if($value->verify==1)
                                        {
                                            echo "<td><a class='btn btn-primary' href=".base_url('AccountController/VerifySeller?id='.$value->Id.'').">Verify </a>
                                            <a href=".base_url('AccountController/Delete?id='.$value->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                        }
                                        else
                                        {
                                            echo "<td><a class='btn btn-primary' style='opacity:0.5;' href='#'>Verify </a>
                                            <a href=".base_url('AccountController/Delete?id='.$value->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                        }
                                    $i++;
                                    }
                                }
                                echo "</tbody>";
                                echo "</table>";

                            ?>
                        </div>        
                    </div>
                </div>
                <div class="row">
                    <div class="card card-data">
                        <div class="card-body">
                            <h3 class="card-title">Customer Accounts</h3>
                            <?php
                                $i=1;
                                echo "<table class='table'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Sr No.</th>";
                                echo "<th>User Name</th>";
                                echo "<th>User Email</th>";
                                echo "<th>Role</th>";
                                echo "<th>Verification</th>";
                                echo "<th>Actions</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($result as $value)
                                {
                                    if($value->Role=='Customer')
                                    {
                                    echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$value->Username."</td>";
                                        echo "<td>".$value->Email."</td>";
                                        echo "<td>".$value->Role."</td>";
                                        if($value->verify==1)
                                        {
                                            echo "<td>Verified</td>";
                                        }
                                        elseif($value->verify==2)
                                        {
                                            echo "<td>Active</td>";
                                        }
                                        else
                                        {
                                            echo "<td>Pending</td>";
                                        }

                                        // For Edit & Delete

                                        // echo "<td><a class='btn btn-primary' href=".base_url('AccountController/Edit?id='.$value->Id.'').">Edit </a>
                                        // <a href=".base_url('AccountController/Delete?id='.$value->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                        
                                        //for Deleting Account
                                        
                                        echo "<td><a href=".base_url('AccountController/Delete?id='.$value->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                    $i++;
                                    }
                                }
                                echo "</tbody>";
                                echo "</table>";

                            ?>
                        </div>        
                    </div>
                </div>
                <div class="row">
                    <div class="card card-data">
                        <div class="card-body">
                            <h3 class="card-title">Admin Accounts</h3>
                            <?php
                                $i=1;
                                echo "<table class='table'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Sr No.</th>";
                                echo "<th>Admin Name</th>";
                                echo "<th>Admin Email</th>";
                                echo "<th>Verification</th>";
                                echo "<th>Actions</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach($result as $value)
                                {
                                    if($value->Role=='Admin')
                                    {
                                    echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$value->Username."</td>";
                                        echo "<td>".$value->Email."</td>";
                                        if($value->verify==1)
                                        {
                                            echo "<td>Verified</td>";
                                        }
                                        else
                                        {
                                            echo "<td>Pending</td>";
                                        }
                                        echo "<td><a class='btn btn-primary' href=".base_url('AccountController/Edit?id='.$value->Id.'').">Edit </a>
                                        <a href=".base_url('AccountController/Delete?id='.$value->Id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
                                    $i++;
                                    }
                                }
                                echo "</tbody>";
                                echo "</table>";

                            ?>

                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="card maind" style="margin-left:20px; text-align:center; width:1050px; margin-top:30px;">
                <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('AccountController/register')?>">Add New Admin</a>
            </div>
            </div>
            </div>
        </div>