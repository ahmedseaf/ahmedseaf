
<div class="modal fade" id="<?= @$target; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=  @$action; ?> " class="form-users" enctype="multipart/form-data">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= @$heading ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="resultMessage"></div>
                    </div>
                </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="f_name">First Name</label>
                            <input class="form-control" type="text"  value="<?php echo $fname ; ?>"  name="first_name"  placeholder="First Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="l+name">Last Name</label>
                            <input class="form-control" type="text"  value="<?php echo $lname ; ?>"  name="last_name"  placeholder="Last Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="group">Group</label>
                            <select class="form-control" name="users_group_id" id="group">
                                <?php foreach ($users_groups AS $users_group) : ?>
                                    <option value="<?php echo $users_group->id; ?>"><?php echo $users_group->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Enabled">Enabled</option>
                                <option value="Disabled">Disabled</option>
                            </select>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="email">Email Address</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $email ; ?>"  placeholder="Email Address">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password"  placeholder="Enter Your Password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="r_password">Re Password</label>
                            <input class="form-control" type="password" name="r_password"  placeholder="Replay Your Password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female" <?php echo $gender == 'Female' ? 'selected': false; ?>>Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="birthday" >Birthday</label>
                            <input type="text" class="form-control" name="birthday" value="<?php echo $birthday; ?>" id="birthday">
                        </div>
                     <!--       For Image                 -->
                        <div class="form-group col-md-6">
                            <label for="image">Image </label>
                            <input class="form-control" type="file" name="image"  >
                        </div>

                        <?php if($image) {?>
                        <div class="form-group col-md-6">
                            <img class="form-control" style="width: 120px; height: 120px" src="<?php  echo $image; ?>">
                        </div>
                        <?php  } ?>




                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <button id="addCategory" class="btn btn-primary addUsers"><?= @$buttonTitle ?></button>
            </div>
        </div>
        </form>
    </div>
</div>
