
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
                            <input class="form-control" type="text"  value="<?php echo $site_name ?>"  name="site_name"  placeholder="Site Name">
                        </div>
                        <div class="form-group col-md-12">
                            <input class="form-control" type="text"  value="<?php echo $site_description ?>"  name="site_description"  placeholder="Site Description">
                        </div>
                        <div class="form-group col-md-12">
                            <input class="form-control" type="text"  value="<?php echo $keyword ?>"  name="keyword"  placeholder="Keywords">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $facebook ?>"  name="facebook"  placeholder="facebook">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $twitter ?>"  name="twitter"  placeholder="twitter">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $google ?>"  name="google"  placeholder="google">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $youtube ?>"  name="youtube"  placeholder="youtube">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $instgram ?>"  name="instgram"  placeholder="instgram">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text"  value="<?php echo $linkedIn ?>"  name="linkedIn"  placeholder="linkedIn">
                        </div>
                            <!--       For Image                 -->
                        <div class="form-group col-md-6">
                                <label for="image_logo">Image Logo</label>
                                <input class="form-control" type="file"  name="image_logo" id="image_logo" >
                            </div>
                       <?php if($image_logo) {?>
                            <div class="form-group col-md-6">
                                <img class="form-control" style="width: 120px; height: 120px" src="<?php  echo $image_logo; ?>">
                            </div>
                        <?php  } ?>
                        <div class="form-group col-md-6">
                            <label for="image_fave">Image FaveIcon</label>
                            <input class="form-control" type="file"  name="image_fave" id="image_fave" >
                        </div>
                            <?php if($image_fave) {?>
                                <div class="form-group col-md-6">
                                    <img class="form-control" style="width: 120px; height: 120px" src="<?php  echo $image_fave; ?>">
                                </div>
                            <?php  } ?>
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
