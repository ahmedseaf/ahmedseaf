<div class="row">
    <div class="col-md-4">

        <?php  if( count($showSettings) == 0 ) :?>
        <button class="btn btn-info mb-2 pull-right usersModal"
                data-toggle="modal" data-modal-target="#add-setting-form"
                data-target="<?php echo url('admin/setting/add') ; ?>">
            اضافة ماركة جديدة  </button>
        <?php endif;?>
    </div>

        <div class="col-md-8" id="message"></div>
        <?php if($result) {?>
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
                        <th >Site Name</th>
                        <th >Site Logo </th>
                        <th >Site Fave </th>
                        <th style="width: 20%;">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($settings)) : foreach ($settings AS $setting) :?>
                    <tr>
                        <td><?= $setting->site_name ; ?></td>
                        <td >
                            <img src="<?php echo assets('images/'. $setting->logo) ?>" alt="<?php echo $setting->site_name?>" style="width: 70px; height: 70px; border-radius:50%;" >
                        </td>

                        <td >
                            <img src="<?php echo assets('images/'. $setting->fave_icon) ?>" alt="<?php echo $setting->site_name?>" style="width: 70px; height: 70px; border-radius:50%;" >
                        </td>

                        <td>
                            <!--        Edit Button                    -->
                            <button class="usersModal btn btn-outline-info"
                                    data-target="<?php echo url('admin/setting/edit/' . $setting->id) ?>"
                                    data-modal-target="#edit-setting-<?php echo ( $setting->id)?>"> <i class="fas fa-edit">Edit</i>

                            </button>


                        <!--        Delete Button                    -->

<!--                            <button  class="btn btn-outline-danger SubCategoryDelete"-->
<!--                            data-subcategoryid="--><?php // echo url('admin/brand/delete/'.$setting->id); ?><!--"-->
<!---->
<!--                            ><i class="fas fa-trash"> Delete</i></button>-->

                        </td>
                    </tr>
                    <?php endforeach; endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




