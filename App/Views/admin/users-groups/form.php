
<div class="modal fade" id="<?= @$target; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=  @$action; ?> " class="form-users-groups">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= @$heading ?> Groups</h5>
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

                        <div class="form-group col-md-12">
                            <label for="permission"> Permission Pages</label>
                            <select class="form-control" name="permission[]" id="permission" multiple>
                                <?php foreach ($pages AS $page) : ?>
                                <option value="<?php echo $page ?>" <?php echo in_array($page, $users_group_pages) ? 'selected' : false ; ?>><?php echo $page ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="cat_name">Users Groups Name</label>
                            <input class="form-control" type="text" name="name" value="<?= @$name; ?>" placeholder="Users Groups Name">
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <button id="addCategory" class="btn btn-primary addUsersGroups"><?= @$buttonTitle ?></button>
            </div>
        </div>
        </form>
    </div>
</div>
