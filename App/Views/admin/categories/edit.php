<form action="<?php echo url('/admin/categories/save/'.$categoryId); ?>"
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
                        <option  value="Enabled">Enabled</option>
                        <option <?php echo $categoryStatus == 'Disabled' ? 'selected' : '' ?> value="Disabled">Disabled</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="cat_name">Category Name</label>
                    <input class="form-control" type="text" name="name" id="cat_name" placeholder="Category Name" value="<?php echo $categoryName?>">
                </div>

                <div class="form-group col-md-12">
                    <label for="title">Category Title</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Category Title" value="<?php echo $title?>">
                </div>

                <div class="form-group col-md-12">
                    <label for="description">Category Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo $description?></textarea>
                </div>

                <div class="form-group col-md-6">
                    <input class="form-control" type="file"  name="image"  >
                </div>

                <?php
                    if($catImage) {?>
                        <div class="form-group col-md-6">
                            <img src="<?php  echo $catImage; ?>" class="form-control" style="width: 120px; height: 120px" >
                        </div>
                    <?php  } ?>



                <div class="col-md-6 offset-3">
                    <button class="btn btn-primary  btn-block">Update Category</button>
                </div>
            </div>
        </div>

    </div>
</form>