
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



                            <div class="form-group col-md-12">
                                <input class="form-control" type="text"  value="<?php echo $name ?>"  name="name"  placeholder="Brand Name">
                            </div>

                        <div class="form-group col-md-12">
                            <input class="form-control" type="text"  value="<?php echo $title ?>"  name="title"  placeholder="Brand Title Hint">
                        </div>

                        <div class="form-group col-md-12">
                            <textarea class="form-control textarea" type="text"   name="description" id="description" cols="10" rows="10"> <?php echo $description ?></textarea>
                        </div>








                            <!--       For Image                 -->
                            <div class="form-group col-md-6">
                                <label for="image_header">Image Headers</label>
                                <input class="form-control" type="file"  name="image_header" id="image_header" >
                            </div>



                        <?php if($imageHeader) {?>
                            <div class="form-group col-md-6">
                                <img class="form-control" style="width: 120px; height: 120px" src="<?php  echo $imageHeader; ?>">
                            </div>
                        <?php  } ?>


                        <div class="form-group col-md-6">
                            <label for="Brand_Logo">Brand Logo</label>
                            <input class="form-control" type="file"  name="image" id="Brand_Logo" >
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
            </div>
        </form>
    </div>
</div>
