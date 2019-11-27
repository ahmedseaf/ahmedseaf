<form action="<?php echo url('/admin/categories/save/'.$categories->id);?>"
        method="post" enctype="multipart/form-data">
    <div class="card">

        <div class="card-header">
            Edit Category
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?php if($errors) {?>
                        <div class="alert alert-danger"> <?php echo $errors ;?></div>
                    <?php } ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="cat_enable">Status</label>
                    <select class="form-control" name="status" id="cat_enable">
                        <option value="Enabled">Enabled</option>
                        <option value="Disabled" <?php echo $categories->status == 'Disabled'  ? 'selected' : false  ?>>Disabled</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="cat_name">Category Name</label>
                    <input class="form-control" type="text" name="name" id="cat_name" placeholder="Category Name" value="<?= isset($categories->name) ?  $categories->name : ''?>">
                </div>

                <div class="col-md-6 offset-3">
                    <button class="btn btn-primary  btn-block">Update Category</button>
                </div>
            </div>
        </div>

    </div>
</form>