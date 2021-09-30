
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <h2 style='padding-top:10px; padding-left:20px;'>Admin/Products:</h2>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!--Show Pages-->
                <div class="row">
                    <div class="card maind" style="margin-left:20px; padding-left:20px; text-align:center; width:1050px; margin-top:30px;">
                        <div class="card-body">
                            <h3 class="card-title">Edit Product</h3><hr>
                <?php
                    foreach($result as $row)
                    {
                        ?>
                    <form method='post' action="<?=base_url('ProductController/edit')?>">
                    <input type='hidden' name='id' value='<?=$row->Id?>'>
                    </div>
                    <div style="padding-top:20px;">
                        <h4>Product Name:</h4>
                        <input type='text' style="width:400px;" name='name' value='<?=$row->Name?>'  placeholder='Add Product Name...'><br>
                    </div>
                    <div style="padding-top:20px;">
                        <h4>Product Description:</h4>
                        <textarea name='desc' style=" width:400px;" placeholder='Add Product Description...'><?=$row->Description?></textarea><br>
                    </div>
                    <div style="padding-top:20px;">
                        <h4>Category:</h4>
                         <input type='text' name='cat' style="width:400px;" value='<?=$row->Category?>' placeholder='Add product Category..'><br>
                    </div>
                    <div style="padding-top:20px;">
                        <h4>Purchase Price:</h4>
                        <input type='text' name='pprice' style=" width:400px;" value='<?=$row->PurchasePrice?>' placeholder='Add Purchase Price..'><br>
                    </div>
                    <div style="padding-top:20px;">
                        <h4>Sale Price:</h4>
                        <input type='text' name='sprice' style=" width:400px;" value='<?=$row->SalePrice?>' placeholder='Add Sale Price..'><br>
                    </div>
                    <div style="padding-top:20px;">
                        <h4>Product Image:</h4>
                        <input type='file' name='img' style=" width:400px;" placeholder='Add Image..'><br>
                        <input type='hidden' name='imge' value='<?=$row->Image?>'>
                    </div>
                    <div style="padding-top:40px; margin-bottom:40px;">
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