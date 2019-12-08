
<!-- start Input Search -->
<div class="card">
    <div class="card-header">
        <h2>Search Category</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <form class="form-inline">

                    <input  class="form-control " style="width: 80%;" type="text" name="search" id="search" autocomplete="off" >
                    <button class="form-control btn btn-primary" style="width: 20%;" >Search</button>
                </form>
            </div>
            <div class="col-md-5">
                <div class="list-group" style="max-height: 300px; overflow: hidden;" id="categoryList">

<!--                    <a href="#" class="list-group-item list-group-item-action border-1">list</a>-->
                </div>
            </div>
        </div>

    </div>
</div>

<!-- End Input Search-->



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
                <input type="submit" id="submit" value="upload" class="btn btn-info">
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


<!--<div class="custom-control custom-radio" style="float: right;">-->
<!--    <input class="custom-control-input" type="radio" id="'.$getFile->name.'"-->
<!--           name="customRadio" checked="">-->
<!--    <label for="'.$getFile->name.'" class="custom-control-label"></label>-->
<!--</div>-->