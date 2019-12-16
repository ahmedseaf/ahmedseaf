<div class="row">
    <div class="col-md-4">
        <button class="btn btn-info mb-2 pull-right usersModal"
                data-toggle="modal" data-modal-target="#add-min-category-form"
                data-target="<?php echo url('admin/min-category/add') ; ?>">
            اضافة قسم فرعى جديد  </button>
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
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr>
                        <th >Category</th>
                        <th >Sub Category </th>
                        <th >Min Sub Category </th>
                        <th >image </th>
                        <th >Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($minCategories AS $minCategory) :?>
                    <tr>
                        <td><?= $minCategory->category ; ?></td>
                        <td><?= $minCategory->subCategory ; ?></td>
                        <td><?= $minCategory->name ; ?></td>

                        <td >
                            <img src="<?php echo assets('images/'. $minCategory->image) ?>" style="width: 70px; height: 70px; border-radius:50%;" >
                        </td>

                        <td>
                            <!--        Edit Button                    -->
                            <button class="usersModal btn btn-outline-info"
                                    data-target="<?php echo url('admin/min-category/edit/' . $minCategory->id) ?>"
                                    data-modal-target="#edit-min-category-<?php echo ( $minCategory->id)?>"> <i class="fas fa-edit">Edit</i>

                            </button>


                        <!--        Delete Button                    -->

<!--                            <button  class="btn btn-outline-danger MinCategoryDelete"-->
<!--                            data-mincategoryid="--><?php // echo url('admin/min-category/delete/'.$minCategory->id); ?><!--"-->
<!--                            data-mincategory="--><?php // echo '<b>'.$minCategory->name. '<b>' ; ?><!--"-->
<!--                            ><i class="fas fa-trash"> Delete</i></button>-->
<!--                            -->
                            <button   class="btn btn-outline-danger categoryDelete"
                                      data-catid="<?php  echo url('admin/min-category/delete/'.$minCategory->id); ?>"
                                      data-catname="<?php  echo '<b>'.$minCategory->name. '<b>' ; ?>">
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




