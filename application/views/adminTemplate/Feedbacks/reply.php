<div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <h4 class="page-title text-uppercase font-medium font-14">Feedback Reply</h4>
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
                                        <h3 class="card-title text-uppercase font-medium font-18">Add Reply</h3><hr>
                                        <?php
                                                foreach($result as $row)
                                                {
                                        ?>
                                        <form method='post' class="form-horizontal form-material" action="<?=base_url('OrderController/newreply')?>">
                                                <div class="form-group mb-4">
                                                        <h4>Email Address:</h4>
                                                        <input type='text' class="form-control p-0 border-0" name='email'  placeholder='Add Reply email...' value='<?=$row->email?>' readonly><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>Reply Subject:</h4>
                                                        <input type='text' class="form-control p-0 border-0" name='subject'  placeholder='Add Reply Subject...' required><br>
                                                </div>
                                                <div class="form-group mb-4">
                                                        <h4>Reply Body:</h4>
                                                        <input type='text' class="form-control p-0 border-0" name='msg'  placeholder='Add Reply Body...' required><br>
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
        