
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">Edit Product</h3>
                        <p class="card-category">Edit Product Details</p>
                    </div>
                    <div class="card-body">
                        <?php
                            foreach($result as $row)
                            {
                        ?>
                        <form method='post' action="<?=base_url('seller/ProductController/edit')?>" enctype="multipart/form-data">
                            <input type='hidden' name='id' value='<?=$row->Id?>'>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Product Name:</label>
                                    <input type='text' class="form-control" name='name' value='<?=$row->Name?>'  placeholder='Add Product Name...'><br>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Product Description:</label>
                                    <textarea name='desc' class="form-control" placeholder='Add Product Description...'><?=$row->Description?></textarea><br>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Category:</label>
                                    <select name='cat' class="form-control">
                                        <?php
                                            foreach($cat as $cate)
                                            {
                                                if($row->Category==$cate->Id)
                                                {
                                                    echo "<option style='background-color:#3C4858;' value='".$cate->Id."' selected>".$cate->Name."</option>";
                                                }
                                                else
                                                {
                                                    echo "<option style='background-color:#3C4858;' value='".$cate->Id."'>".$cate->Name."</option>";
                                                }
                                            }
                                        ?>
                                    </select><br>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Purchase Price:</label>
                                    <input type='text' name='pprice' class="form-control" value='<?=$row->PurchasePrice?>' placeholder='Add Purchase Price..'><br>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Sale Price:</label>
                                    <input type='text' name='sprice' class="form-control" value='<?=$row->SalePrice?>' placeholder='Add Sale Price..'><br>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Quantity:</label>
                                    <input type='text' name='qty' class="form-control" value='<?=$row->Quantity?>' placeholder='Add Quantity..'><br>
                                </div>
                                <div>
                                    <label class="bmd-label-floating">Product Image:</label>
                                    <input type='file' name='img' class="form-control" placeholder='Add Image..'><br>
                                    <input type='hidden' name='imge' value='<?=$row->Image?>'>
                                </div>
                                <div class="form-group">
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
</div>
