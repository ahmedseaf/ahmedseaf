<form class="form-product" action="<?php  echo $action?>" method="post" style="direction: rtl" enctype="multipart/form-data">
    <div class="row">
        <div id="resultMessage"></div>
        <div class="form-group col-md-8">
            <input type="text" class="form-control border-info" name="name" required placeholder="Enter Your Product Name">
        </div>

       <div class="form-group col-md-4">
           <select class="form-control" name="country" id="country">
               <option value="" disabled selected>Select Country</option>
               <option value="Egypt">Egypt</option>
               <option value="USA">USA</option>
               <option value="China">China</option>
               <option value="Italy">Italy</option>
               <option value="Germany">Germany</option>
               <option value="Aspen">Aspen</option>
           </select>
       </div>

<!--        <div class="form-group col-md-12">-->
<!--            <label for="title">Hint Description</label>-->
<!--            <textarea class="form-control textarea" name="title" id="title" cols="30" rows="6" ></textarea>-->
<!--        </div>-->

        <div class="form-group col-md-3">
            <select class="form-control" name="categories" id="product_categories">
                <option value="" disabled selected>Select Category</option>
                <?php foreach ($categories AS $category) : ?>
                <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" name="sub_category" id="sub_category">
                <option value="" disabled selected>Select Sub Category</option>

            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" name="min_sub_category" id="min_sub_category">
                <option value="" disabled selected>Select Min Sub Category</option>
                <option value="Egypt">Egypt</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <select class="form-control" name="brand" id="brand">
                <option value="" disabled selected>Select Product Brand</option>
                <?php foreach ($brands AS $brand) : ?>
                <option value="<?php  echo $brand->id ; ?>"><?php  echo $brand->name ; ?></option>
                <?php  endforeach; ?>
            </select>
        </div>



    <div class="form-group col-md-2">
        <label for="price">Price</label>
        <input class="form-control" type="number" name="price" id="price">
    </div>

    <div class="form-group col-md-2">
        <label for="total">Total</label>
        <input class="form-control" type="number" name="total" id="total">
    </div>

    <div class="form-group col-md-2">
        <label for="discount">Discount</label>
        <input class="form-control" type="number" name="discount" id="discount">
    </div>

    <div class="form-group col-md-3">
        <label for="currency">Currency</label>
        <select class="form-control" name="currency" id="currency">
            <option value="EGP">EGP</option>
            <option value="USD">USD</option>
            <option value="EU">EU</option>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="unit">Unit</label>
        <select class="form-control" name="unit" id="unit">
            <option value="وحدة">وحدة</option>
            <option value="طقم">طقم</option>
            <option value="كيلو جرام">كيلو جرام</option>
            <option value="متر">متر</option>
        </select>
    </div>


        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea class="form-control textarea" name="description" id="description" cols="30" rows="30" ></textarea>
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
                        <th >Option</th>
                        <th >Description </th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>


    </div>
        <input class="btn btn-primary col-md-6 offset-3" id="insertProduct"
               value="Add New Product" type="submit" name="submit">


</form>


<!-- start For Image View-->
<div class="card">
    <div class="card-header">
        <div id="status"></div>
    </div>
    <div class="card-body">
        <form id="formImage" method="post" action="<?php echo url('/test/getdata')  ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="uploadFile"> Upload File </label>
                <input class="btn btn-info" type="file" name="uploadFile[]" id="uploadFile" multiple accept=".*">
            </div>
            <div class="form-group">
                <button id="submit" name="upload" class="btn btn-info"> Upload</button>
            </div>
            <div class="progress mb-5">
                <div class="progress-bar bg-info " id="fillProgress" role="progressbar" aria-valuenow="0"
                     aria-valuemin="0" aria-valuemax="100%" >0%
                </div>
            </div>
            <input type="hidden" name="action" value="file_upload">
        </form>
        <div class="row" id="allImageView">

        </div>
    </div>
</div>
<!-- End For Image View-->
