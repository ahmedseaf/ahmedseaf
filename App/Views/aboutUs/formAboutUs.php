
<div class="modal fade" id="<?= @$target; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=  @$action; ?> " class="form-users" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="resultMessage"></div>
                        </div>



                        <div class="form-group col-md-12">
                            <input class="form-control" type="text"  value="<?php echo $address ?>"  name="address"  placeholder="Add Address">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $mobile1 ?>"  name="mobile1"  placeholder="Add Mobile Phone 2 ">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $mobile2 ?>"  name="mobile2"  placeholder="Add Mobile Phone 2 ">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $phone1 ?>"  name="phone1"  placeholder=" ادخل الهاتف الارضى 1 ">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $phone2 ?>"  name="phone2"  placeholder="ادخل الهاتف الارضى  2 ">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $fax ?>"  name="fax"  placeholder=" fax">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="email"  value="<?php echo $email ?>"  name="email"  placeholder="email ">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $web ?>"  name="web"  placeholder="الموقع الالكترونى ">
                        </div>

















                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button id="addCategory" class="btn btn-primary addUsers"><?= @$buttonTitle ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
