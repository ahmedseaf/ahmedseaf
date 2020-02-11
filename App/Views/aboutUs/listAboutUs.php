<div class="row">
    <div class="col-md-4">
      <?php if(count($aboutUs) <= 0) { ?> <button class="btn btn-info mb-2 pull-right usersModal"
                data-toggle="modal" data-modal-target="#add-about-form"
                data-target="<?php echo url('admin/about/add') ; ?>">
            اضافة بيانات التواصل  </button> <?php }?>
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
                About Us
            </div>


            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr>
                        <th >address</th>
                        <th >mobile 1 </th>
                        <th >mobile 2 </th>
                        <th >phone 1 </th>
                        <th >phone 2 </th>
                        <th >fax </th>
                        <th >email </th>
                        <th >web </th>
                        <th style="width: 20%;">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($aboutUs AS $about) :?>
                    <tr>
                        <td><?= $about->address ; ?></td>
                        <td><?= $about->mobile1 ; ?></td>
                        <td><?= $about->mobile2 ; ?></td>
                        <td><?= $about->phone1 ; ?></td>
                        <td><?= $about->phone2 ; ?></td>
                        <td><?= $about->fax ; ?></td>
                        <td><?= $about->email ; ?></td>
                        <td><?= $about->web ; ?></td>


                        <td>
                            <!--        Edit Button                    -->
                            <button class="usersModal btn btn-outline-info"
                                    data-target="<?php echo url('admin/about/edit/' . $about->id) ?>"
                                    data-modal-target="#edit-about-<?php echo ( $about->id)?>"> <i class="fas fa-edit">Edit</i>

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




