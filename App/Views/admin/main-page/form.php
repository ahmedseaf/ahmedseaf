
<div class="modal fade" id="main-page-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" class="form-users" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button id="addCategory" class="btn btn-primary addUsers">go<?= @$buttonTitle ?></button>
                    </div>
                </div>
        </form>
    </div>
</div>
