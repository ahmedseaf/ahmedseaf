<form class="form-product" action="<?php echo $action?>"
      method="post" style="direction: rtl" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12 text-center">
            <div id="messageProduct"
                 style="position: fixed; top: 2%; right: 50%; z-index: 99999"></div>
        </div>
        <div id="resultMessage"></div>
        <div class="form-group col-md-8">
            <input type="text" class="form-control border-info" name="name" value="<?php  echo $name ?>" required placeholder="Enter Your Product Name">
        </div>


       <div class="form-group col-md-4">
           <select class="form-control" name="country" id="country">
               <option value="" disabled selected>Select Country</option>
               <option value="Egypt"    <?php echo $country == 'Egypt' ? 'selected': false; ?>>Egypt</option>
               <option value="USA"      <?php echo $country == 'USA' ? 'selected': false; ?>>USA</option>
               <option value="China"    <?php echo $country == 'China' ? 'selected': false; ?>>China</option>
               <option value="Italy"    <?php echo $country == 'Italy' ? 'selected': false; ?>>Italy</option>
               <option value="Germany"  <?php echo $country == 'Germany' ? 'selected': false; ?>>Germany</option>
               <option value="Aspen"    <?php echo $country == 'Aspen' ? 'selected': false; ?>>Aspen</option>
           </select>
       </div>

<!--        <div class="form-group col-md-12">-->
<!--            <label for="title">Hint Description</label>-->
<!--            <textarea class="form-control textarea"  name="title" id="title" cols="30" rows="6" >--><?php //echo $title; ?><!--</textarea>-->
<!--        </div>-->

        <div class="form-group col-md-3">
            <select class="form-control" name="categories" id="product_categories">
                <option value="" disabled selected>Select Category</option>
                <?php foreach ($categories AS $category) : ?>
                <option value="<?php echo $category->id ?>" <?php echo $categoryId == $category->id ? 'selected': false; ?>><?php echo $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" name="sub_category" id="sub_category">
                <option value="" disabled selected>Select Sub Category</option>
                <?php if($subCategory) :?>
                    <?php foreach ($subCategory AS $sub) : ?>
                    <option value="<?php echo $sub->id ?>" <?php echo $subId == $sub->id ? 'selected': false; ?>><?php echo $sub->name ?></option>
                    <?php endforeach ;?>
                <?php endif;?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" name="min_sub_category" id="min_sub_category">
                <option value="" disabled selected>Select Min Sub Category</option>
                <option value="Egypt">Egypt</option>
                <?php if($minCategory) :?>
                    <?php foreach ($minCategory AS $min) : ?>
                        <option value="<?php echo $min->id ?>" <?php echo $minId == $min->id ? 'selected': false; ?>><?php echo $min->name ?></option>
                    <?php endforeach ;?>
                <?php endif;?>
            </select>
        </div>

        <div class="form-group col-md-3">
            <select class="form-control" name="brand" id="brand">
                <option value="" disabled selected>Select Product Brand</option>
                <?php foreach ($brands AS $brand) : ?>
                <option value="<?php  echo $brand->id ; ?>" <?php echo $brandId == $brand->id ? 'selected': false; ?>><?php  echo $brand->name ; ?></option>
                <?php  endforeach; ?>
            </select>
        </div>



    <div class="form-group col-md-2">
        <label for="price">Price</label>
        <input class="form-control" value="<?php  echo $price; ?>" type="number" name="price" id="price">
    </div>

    <div class="form-group col-md-2">
        <label for="total">Total</label>
        <input class="form-control" value="<?php  echo $total ;?>" type="number" name="total" id="total">
    </div>

    <div class="form-group col-md-2">
        <label for="discount">Discount</label>
        <input class="form-control" type="number" value="<?php  echo $discount ; ?>" name="discount" id="discount">
    </div>

    <div class="form-group col-md-3">
        <label for="currency">Currency</label>
        <select class="form-control" name="currency" id="currency">
            <option value="EGP" <?php echo $currency == 'EGP' ? 'selected': false; ?>>EGP</option>
            <option value="USD" <?php echo $currency == 'USD' ? 'selected': false; ?>>USD</option>
            <option value="EU"  <?php echo $currency == 'EU' ? 'selected': false; ?>>EU</option>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="unit">Unit</label>
        <select class="form-control" name="unit" id="unit">
            <option value="وحدة"        <?php echo $unit == 'وحدة' ? 'selected': false; ?>>وحدة</option>
            <option value="طقم"         <?php echo $unit == 'طقم' ? 'selected': false; ?>>طقم</option>
            <option value="كيلو جرام"   <?php echo $unit == 'كيلو جرام' ? 'selected': false; ?>>كيلو جرام</option>
            <option value="متر"         <?php echo $unit == 'متر' ? 'selected': false; ?>>متر</option>
        </select>
    </div>


        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea class="form-control textarea" name="description" id="description" cols="30" rows="30" ><?php echo $description ?></textarea>
        </div>


        <div class="form-group col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 3%;">
                            <button class="btn btn-outline-success add" name="add" id="add"
                            ><i class="fas fa-plus-circle"></i>
                            </button>
                        </th>
                        <th style="width: 30%;">Option</th>
                        <th >Description </th>

                    </tr>
                </thead>
                <tbody>
                <?php foreach ($options AS $option) : ?>
                    <tr>

                        <td>
                            <button class="btn btn-outline-danger remove"
                             name="remove" data-optionid="<?php echo url('admin/product/deleteoptions/'.$option->id)?>"
                                            data-optionname="<?php echo $option->name?>"
                                    id="remove_options" ><i class="fas fa-trash"></i>
                            </button>
                        </td>
                        <td><?php echo $option->name?></td>
                        <td><?php echo $option->description?></td>

                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>


    </div>
        <input class="btn btn-primary col-md-6 offset-3" id="saveProduct"
               value="Update Product" type="submit" name="submit">


</form>


<!-- start For Image View-->
<div class="card">
    <div class="card-header">
        <div id="status"></div>
    </div>
    <div class="card-body">
        <form id="formImagePro" method="post" data-image="<?php echo $getAllImageById ?>" action="<?php echo $actionImage; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="uploadFilePro"> Upload File </label>
                <input class="btn btn-info" type="file" name="uploadFilePro[]" id="uploadFilePro" multiple accept=".*">
            </div>
            <div class="form-group">
                <button id="submitPro" name="uploadPro" class="btn btn-info"> Upload</button>
            </div>
            <div class="progress mb-5">
                <div class="progress-bar bg-info "  id="fillProgressPro" role="progressbar" aria-valuenow="0"
                     aria-valuemin="0" aria-valuemax="100%" >0%
                </div>
            </div>
            <input type="hidden" name="actionpro" value="file_upload_pro">
        </form>
        <div class="row" id="allImageViewPro">

        </div>
    </div>
</div>
<!-- End For Image View-->






