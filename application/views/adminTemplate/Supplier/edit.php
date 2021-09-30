
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <h2 style='padding-top:10px; padding-left:20px;'>Admin/Supplier:</h2>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!--Show Pages-->
                <div class="row">
                    <div class="card maind" style="margin-left:20px; padding-left:20px; text-align:center; width:1050px; margin-top:30px;">
                        <div class="card-body">
                            <h3 class="card-title">Update Supplier</h3><hr>
        <?php
        foreach($result as $row)
        {
            ?>
        <form method='post' action="<?=base_url('SupplierController/edit')?>">
        <input type='hidden' name='id' value='<?=$row->Id?>'>
        </div>
        <div style="padding-top:20px;">
        <h4>Supplier Name:</h4>
        <input type='text' name='name' style=" width:400px;" value='<?=$row->Name?>' placeholder='Supplier name'><br>
        </div>
        <div style="padding-top:20px;">
        <h4>Supplier Address:</h4>
        <input type='text' style=" width:400px;" name='add' placeholder='Supplier Address' value='<?=$row->Address?>'><br>
        </div>
        <div style="padding-top:20px;">
        <h4>Supplier Phon No.:</h4>
        <input type='number' style=" width:400px;" name='phone' placeholder='Supplier Phone No.' value='<?=$row->Phone?>'><br>
        </div>
        <div style="padding-top:20px;">
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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    </body>
</html>