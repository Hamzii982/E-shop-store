
<div class="content">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                        <div class="card-header card-header-primary">
                                                <h3 class="card-title">Add New Payment Type</h3>
                                                <p class="card-category">Complete your Bank Payment Details</p>
                                        </div>
                                        <div class="card-body">
                                                <form method='post' action="<?=base_url('seller/PaymentController/record')?>">
                                                        <div class="form-group">
                                                                <label class="bmd-label-floating">AccountHolder Name</label>
                                                                <input type='text' class="form-control" name='acname'><br>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="bmd-label-floating">Bank Name</label>
                                                                <input type='text' name='bname' class="form-control"><br>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="bmd-label-floating">Branch Code</label>
                                                                <input type='number' name='code' class="form-control"><br>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="bmd-label-floating">Branch Location</label>
                                                                <input type='text' name='address' class="form-control"><br>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="bmd-label-floating">Account Number</label>
                                                                <input type='number' name='acn' class="form-control" ><br>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="bmd-label-floating">IBAN Number</label>
                                                                <input type='text' name='ibn' class="form-control" ><br>
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