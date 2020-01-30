
<div class="modal fade  category_Modal" id="add-category-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=  $action; ?> " class="form-category">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <p id="catMessage"></p>
                        </div>
                    <div class="form-group col-md-6">
                        <label for="cat_enable">Status</label>
                        <select class="form-control" name="status" id="cat_enable">
                            <option value="Enabled">Enabled</option>
                            <option value="Disabled">Disabled</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cat_name">Category Name</label>
                        <input class="form-control" type="text" name="name" id="cat_name" placeholder="Category Name">
                    </div>

                    <!--       For Image                 -->
                    <div class="form-group col-md-6">
                        <input class="form-control" type="file"  name="image"  >
                    </div>



                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addCategory" class="btn btn-primary addCategory">Add Category</button>
            </div>
        </div>
        </form>
    </div>
</div>
