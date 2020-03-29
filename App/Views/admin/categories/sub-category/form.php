
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


                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text"  value="<?php echo $name ?>"  name="name"  placeholder="Sub Category Name">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-md-6">
                                <select class="form-control" name="category_id" id="category_id">
                                    <?php foreach ($categoriesSub AS $category) : ?>
                                        <option value="<?php echo $category->id; ?>"<?php echo $category->id == $categoryId ? 'selected' : false; ?>><?php echo $category->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="description"  id="description" cols="30" rows="10" ><?= $description ;?></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <input class="form-control"  type="text"  value="<?= $titlesub ; ?>"  name="title"  placeholder="Sub Category Title">
                            </div>




                            <!--       For Image                 -->
                            <div class="form-group col-md-6">
                                <input class="form-control" type="file"  name="image"  >
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
