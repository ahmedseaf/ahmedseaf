<div class="row">
    <div class="col-md-3 text-center" style="position: absolute;
     top: 4rem; border-radius: 50%; width: 56px;right: 5rem; height: 40px;">
        <button class="btn btn-outline-primary" onclick="window.location.href='<?php echo url('admin/product/add'); ?>'"
            style="width: 100%;border-radius: 50%; height: 100%;"><i class="fas fa-plus-circle"></i>
        </button>
    </div>
    <div class="col-md-8" id="message"></div>
    <?php if(@$result) {?>
        <div class="toast" role="alert" data-delay=5000 aria-live="assertive" aria-atomic="true">
            <div class="toast-header">

                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
               <?php echo @$result ; ?>
            </div>
        </div>
    <?php } ?>
</div>







<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                All Categories
            </div>


            <div class="card-body">
                <table class="table table-bordered text-center" id="table">
                    <thead>
                    <tr>
                        <th >Category</th>
                        <th >Name</th>
                        <th >Fave</th>
                        <th >Price </th>
                        <th >Image </th>
<!--                        <th >image </th>-->
                        <th width="20%">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products AS $product) :?>
                    <tr>
                        <td><?= $product->category ; ?></td>
                        <td><?= $product->name ; ?></td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" value="enabled" class="form-check-input fave" id="fave" data-product-id="<?php echo $product->id?>" name="fave" <?php echo $product->fave != null ? 'checked' : '' ?> >
                            </div>
                        </td>
                        <td><?= $product->price ; ?></td>
                        <td >
                            <img src="<?php echo assets('images/test/'. $product->Image) ?>" style="width: 70px; height: 70px; border-radius:50%;" >
                        </td>

                        <td>
                            <!--        Edit Button                    -->

                            <button class="btn btn-outline-info" id="editProduct"
                                    onclick="window.location.href='<?php echo url('admin/product/edit/' . $product->id) ?>'"> <i class="fas fa-edit">Edit</i>

                            </button>


                        <!--        Delete Button                    -->

                            <button   class="btn btn-outline-danger productDelete"
                                      data-productid="<?php  echo url('admin/product/delete/'.$product->id); ?>"
                                      data-productname="<?php  echo '<b>'.$product->name. '<b>' ; ?>">
                                      <i class="fas fa-trash"> Delete</i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




