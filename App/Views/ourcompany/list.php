<div class="row">
    <div class="col-md-4">
        <button class="btn btn-info mb-2 pull-right usersModal"
                data-toggle="modal" data-modal-target="#add-company-form"
                data-target="<?php use http\Url;

                echo url('admin/company/add') ; ?>">
            اضافة شركة جديدة  </button>
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
                        <th >Company Name</th>
                        <th >image </th>
                        <th style="width: 23%;">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ourCompany AS $Company) :?>
                    <tr>
                        <td><?= $Company->name ; ?></td>
                        <td >
                            <img src="<?php echo assets('images/'. $Company->image) ?>" style="width: 70px; height: 70px; border-radius:50%;" >
                        </td>


                        <td>
                            <!--        Edit Button                    -->
                            <button class="usersModal btn btn-outline-info"
                                    data-target="<?php echo url('admin/company/edit/' . $Company->id) ?>"
                                    data-modal-target="#edit-company-<?php echo ( $Company->id)?>"> <i class="fas fa-edit">Edit</i>

                            </button>


                        <!--        Delete Button                    -->

                            <button  class="btn btn-outline-danger CompanyDelete"
                            data-companyid="<?php  echo url('admin/company/delete/'.$Company->id); ?>"
                                     data-redirect="<?php  echo  url('admin/company'); ?>"
                            ><i class="fas fa-trash"> Delete</i></button>

                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




