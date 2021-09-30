
<div class="content">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                        <div class="card-header card-header-primary">
                                                <h3 class="card-title">Add New Product</h3>
                                                <p class="card-category">Add Product Details</p>
                                        </div>
                                        <div class="card-body">
                                                <form method='post' action="<?=base_url('seller/ProductController/record')?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                        <label class="bmd-label-floating">Product Name:</label>
                                                        <input type='text' class="form-control" name='name' required><br>
                                                </div>
                                                <div class="form-group">
                                                        <label class="bmd-label-floating">Product Description:</label>
                                                        <textarea name='desc' class="form-control"></textarea><br>
                                                </div>
                                                <div class="form-group">
                                                        <label class="bmd-label-floating">Category:</label>
                                                        <select name='cat' class="form-control">
                                                                <option value='' style='background-color:#3C4858;' disabled selected>Select Product Category</option>
                                                                <?php
                                                                        foreach($cat as $cate)
                                                                        {                                                                 
                                                                                echo "<option style='background-color:#3C4858;' value='".$cate->Id."'>".$cate->Name."</option>";
                                                                        }
                                                                ?>
                                                        </select><br>
                                                </div>
                                                <div class="form-group">
                                                        <label class="bmd-label-floating">Purchase Price:</label>
                                                        <input type='number' name='pprice' class="form-control" required><br>
                                                </div>
                                                <div class="form-group">
                                                        <label class="bmd-label-floating">Sale Price:</label>
                                                        <input type='number' name='sprice' class="form-control" required><br>
                                                </div>
                                                <div class="form-group">
                                                        <label class="bmd-label-floating">Quantity:</label>
                                                        <input type='number' name='qty' class="form-control" required><br>
                                                </div>
                                                <div>
                                                        <label class="bmd-label-floating">Product Image:</label>
                                                        <input type='file' name='img' class="form-control"><br>
                                                </div>
                                                <div class="form-group">
                                                        <input type='submit' class="btn btn-primary" name='Submit' value='Submit'>
                                                </div>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>