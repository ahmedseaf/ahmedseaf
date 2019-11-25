<div class="row">
    <div class="col-md-4">
        <button class="btn btn-info mb-2 pull-right categoryModal"
                data-toggle="modal" data-modal-target="#add-category-form"
                data-target="<?php echo url('/admin/categories/add') ; ?>">
            Add New Category  </button>
    </div>
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
                        <th >Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories AS $category) :?>
                    <tr>


                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td><?= $category->status ?></td>

                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


