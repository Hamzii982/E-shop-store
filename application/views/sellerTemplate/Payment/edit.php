
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
                                            <?php
                                                foreach($result as $row)
                                                {
                                            ?>
                                                <form method='post' action="<?=base_url('seller/PaymentController/edit')?>">
                                                    <input type='hidden' name='id' value='<?=$row->Id?>'>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Accountholder Name</label>
                                                            <input type='text' class="form-control" name='acname' value='<?=$row->Title?>'  placeholder='Add AccountHolder Name...'><br>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Bank Name</label>
                                                            <input type='text' name='bname' class="form-control" placeholder='Add Bank Name...' value='<?=$row->BankName?>'><br>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Branch Code</label>
                                                            <input type='number' name='code' class="form-control" value='<?=$row->BranchCode?>' placeholder='Add Branch Code..'><br>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Branch Location</label>
                                                            <input type='text' name='address' class="form-control" value='<?=$row->BranchAddress?>' placeholder='Add Branch Location..'><br>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Account Number</label>
                                                            <input type='number' name='acn' class="form-control" value='<?=$row->AccountNumber?>' placeholder='Add Account No..'><br>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">IBAN Number</label>
                                                            <input type='text' name='ibn' class="form-control" value='<?=$row->IBANNumber?>' placeholder='Add IBAN No..'><br>
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
                </div>
            </div>
        </div>
    </div>
</div>