
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Edit Sub-Category</h4>
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
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-body">
                            <h3 class="card-title text-uppercase font-medium font-18">Edit Sub-Category Detail</h3><hr>
                            <?php
                                foreach($result as $row)
                                {
                            ?>
                            <form method='post' class="form-horizontal form-material" action="<?=base_url('SubCategoryController/edit')?>">
                                <input type='hidden' name='id' value='<?=$row->id?>'>
                                <div class="form-group mb-4">
                                    <h4>Sub-Category Name:</h4>
                                    <input type='text' class="form-control p-0 border-0" name='name' value='<?=$row->name?>'  placeholder='Add Category Name...'><br>
                                </div>
                                <div class="form-group mb-4">
                                    <h4>Category Name:</h4>
                                    <select name='cname' class="form-control p-0 border-0">
                                    <?php
                                        foreach($resultcat as $category)
                                        {
                                            if($category->Id==$row->category_fid)
                                            {
                                                echo "<option value='$category->Id' selected>".$category->Name."</td>";
                                            }
                                            else
                                            {
                                                echo "<option value='$category->Id'>".$category->Name."</td>";
                                            }

                                        }
                                    ?>
                                    </select>
                                    <!-- <input type='text' class="form-control p-0 border-0" name='cname' value=''  placeholder='Add Category Name...'><br> -->
                                </div>
                                <div class="form-group mb-4">
                                    <input type='submit' class="btn btn-primary" name='Submit' value='Submit'>
                                </div>
                            </form>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>