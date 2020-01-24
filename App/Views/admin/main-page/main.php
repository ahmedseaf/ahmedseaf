
<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> main Slider </h3>
                        <button class="btn btn-outline-primary MainBtnAdd"
                                data-toggle="modal" data-modal-target="#main-page-form"
                                data-target="<?php echo url('admin/main-page/add') ; ?>">+
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                            <tr>
                                <th width="30%">Image</th>
                                <th >Title</th>
                                <th width="12%">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($mainSliders)) {
                                foreach ($mainSliders AS $mainSlider) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $mainSlider->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $mainSlider->title?> </td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$mainSlider->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                                <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> Repeat Slider </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                        <tr>
                            <th width="30%">Image</th>
                            <th >Title</th>
                            <th width="12%">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($repeatSliders)) {
                            foreach ($repeatSliders AS $repeatSlider) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $repeatSlider->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $repeatSlider->title?></td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$repeatSlider->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> Tow Slider </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                        <tr>
                            <th width="30%">Image</th>
                            <th >Title</th>
                            <th width="12%">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($towSliders)) {
                            foreach ($towSliders AS $towSlider) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $towSlider->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $towSlider->title?></td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$towSlider->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--End Tow Slider-->

<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> Some Product </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                        <tr>
                            <th width="30%">Image</th>
                            <th >Title</th>
                            <th width="12%">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($someSliders)) {
                            foreach ($someSliders AS $someSlider) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $someSlider->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $someSlider->title?></td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$someSlider->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            <!--End Some Product -->

<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> Five Slider Large </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                        <tr>
                            <th width="30%">Image</th>
                            <th >Title</th>
                            <th width="12%">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($fiveLargeSliders)) {
                            foreach ($fiveLargeSliders AS $fiveLargeSlider) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $fiveLargeSlider->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $fiveLargeSlider->title?></td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$fiveLargeSlider->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

                <!--     End Five Slider Large -->

<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> Five Tab Small </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                        <tr>
                            <th width="30%">Image</th>
                            <th >Title</th>
                            <th width="12%">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($fiveSmallSliders)) {
                            foreach ($fiveSmallSliders AS $fiveSmallSlider) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $fiveSmallSlider->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $fiveSmallSlider->title?></td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$fiveSmallSlider->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            <!--       End Five Tab Small -->

<div class="tableMainSlider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="headerControl">
                        <h3> Tow Product </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                        <tr>
                            <th width="30%">Image</th>
                            <th >Title</th>
                            <th width="12%">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($towProducts)) {
                            foreach ($towProducts AS $towProduct) : ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo assets('images/'. $towProduct->image) ?>" style="width: 140px; height: 70px;" >
                                    </td>
                                    <td><?php echo  $towProduct->title?></td>
                                    <td>
                                        <button class="btn btn-outline-danger deleteSlide" data-slideId="<?php echo url('admin/main-page/delete/'.$towProduct->id) ; ?>" > <i class="fas fa-trash"> Delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            <!--  End  Tow Product -->

