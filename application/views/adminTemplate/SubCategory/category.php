<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Sub-Categories List</h4>
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
            <div class="col-md-12" >
                <a class='btn btn-secondary' style="justify-items:center;" href="<?=base_url('SubCategoryController/newpage')?>">Add New Sub-Category</a>
            </div>
        </div>
        <div class="row">
            <div class="card card-data">
                <div class="card-body">
                    <h2 class="card-title text-uppercase font-medium font-18">SubCategory Details</h2>
                    <?php
                        $i=1;
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>SubCategory Name</th>";
                        echo "<th>Category Name</th>";
                        echo "<th>Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($result as $row)
                        {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row->name."</td>";
                            foreach($resultcat as $category)
                            {
                                if($category->Id==$row->category_fid)
                                {
                                    echo "<td>".$category->Name."</td>";
                                }

                            }
                            echo "<td><a class='btn btn-primary' href=".base_url('SubCategoryController/edit?id='.$row->id.'').">Edit </a>
                            <a href=".base_url('SubCategoryController/Delete?id='.$row->id.'')." name='delete' id='delete' class='btn btn-danger'> Delete</a></td>";
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