<div class="row">
    <div class="col-md-4">
        <button class="btn btn-info mb-2 pull-right categoryModal"
                data-toggle="modal" data-modal-target="#add-category-form"
                data-target="<?php echo url('/admin/categories/add') ; ?>">
            Add New Category  </button>
    </div>
        <?php if($result) {?>
            <div class="toast" role="alert" data-delay=5000 aria-live="assertive" aria-atomic="true">
                <div class="toast-header">

                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                   <?php echo $result ; ?>
                </div>
            </div>
        <?php } ?>
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
                        <th >Control</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories AS $category) :?>
                    <tr>


                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td><?= $category->status ?></td>
                        <td>
                            <a href="<?php  echo url('admin/categories/edit/'.$category->id); ?>" class="btn btn-outline-info"><i class="fas fa-edit"> Edit</i></a>
<!--                            <button   class="btn btn-outline-danger" data-toggle="modal" data-target="#categoryDelete"><i class="fas fa-trash"> Delete</i></button>-->
                            <button   class="btn btn-outline-danger catDelete"
                            data-catid="<?php  echo url('admin/categories/delete/'.$category->id); ?>"
                            data-catname="<?php  echo '<b>'.$category->name. '<b>' ; ?>"
                            ><i class="fas fa-trash"> Delete</i></button>

                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="categoryDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php   echo url('admin/categories/delete/' . $category->id) ;?>  </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?php  echo url('admin/categories/delete/'.$category->id); ?>" class="btn btn-outline-danger"><i class="fas fa-trash"> Delete</i></a>

<!--                <a href="--><?php // echo url('admin/categories/delete/'.$category->id); ?><!--"  class="btn btn-outline-danger">Delete Category</a>-->

            </div>
        </div>
    </div>
</div>