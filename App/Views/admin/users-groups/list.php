<div class="row">
    <div class="col-md-4">
        <button class="btn btn-info mb-2 pull-right usersGroupsModal"
                data-toggle="modal" data-modal-target="#add-users-groups-form"
                data-target="<?php echo url('admin/users-groups/add') ; ?>">
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
                        <th >ID</th>
                        <th >Category Name</th>

                        <th >Control</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($usersGroups AS $users_group) :?>
                    <tr>


                        <td><?= $users_group->id ?></td>
                        <td><?= $users_group->name ?></td>

                        <td>
                            <!--        Edit Button                    -->
                            <button class="usersGroupsModal btn btn-outline-info"
                                    data-target="<?php echo url('/admin/users-groups/edit/' . $users_group->id) ?>"
                                    data-modal-target="#edit-users-groups-<?php echo ( $users_group->id)?>"> <i class="fas fa-edit">Edit</i>

                            </button>

                            <!--                            <a href="--><?php // echo url('admin/users-groups/edit/'.$users_group->id); ?><!--" class="btn btn-outline-info"><i class="fas fa-edit"> Edit</i></a>-->
<!--                            <button   class="btn btn-outline-danger" data-toggle="modal" data-target="#categoryDelete"><i class="fas fa-trash"> Delete</i></button>-->


                        <!--        Delete Button                    -->
                            <?php if($users_group->id != 1) : ?>
                            <button  class="btn btn-outline-danger UserGroupDelete"
                            data-usergroupid="<?php  echo url('admin/users-groups/delete/'.$users_group->id); ?>"
                            data-usergroupname="<?php  echo '<b>'.$users_group->name. '<b>' ; ?>"
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




