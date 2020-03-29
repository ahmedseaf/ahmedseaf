<div class="row">
    <div class="col-md-4">
        <button class="btn btn-info mb-2 pull-right usersModal"
                data-toggle="modal" data-modal-target="#add-users-form"
                data-target="<?php echo url('admin/users/add') ; ?>">
            Add New Users Groups  </button>
    </div>

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
                        <th >User Name</th>
                        <th >Group </th>
                        <th >Email </th>
                        <th >Status </th>
                        <th >Created</th>
                        <th >Image </th>

                        <th >Control</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users AS $users) :?>
                    <tr>


                        <td><?= $users->firstname. ' ' . $users->lastname; ?></td>
                        <td><?= $users->group; ?></td>
                        <td><?= $users->email; ?></td>
                        <td><?= $users->status; ?></td>
                        <td><?= date('d-m-Y', $users->created) ;?></td>
                        <td >
                            <img src="<?php echo assets('images/'. $users->image) ?>" style="width: 70px; height: 70px; border-radius:50%;" >
                        </td>

                        <td>
                            <!--        Edit Button                    -->
                            <button class="usersModal btn btn-outline-info"
                                    data-target="<?php echo url('admin/users/edit/' . $users->id) ?>"
                                    data-modal-target="#edit-users-<?php echo ( $users->id)?>"> <i class="fas fa-edit">Edit</i>

                            </button>



                        <!--        Delete Button                    -->
                            <?php if($users->id != 1) : ?>
                            <button  class="btn btn-outline-danger UserDelete"
                            data-userid="<?php  echo url('admin/users/delete/'.$users->id); ?>"
                            data-username="<?php  echo '<b>'.$users->firstname. '<b>' ; ?>"
                            ><i class="fas fa-trash"> Delete</i></button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




