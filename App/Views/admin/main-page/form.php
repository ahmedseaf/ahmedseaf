
<div class="modal fade" id="main-page-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?php echo isset($action) ? $action : ''; ?>" class="form-slide" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo isset($heading) ? $heading : '' ;  ?> </h5>
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
                            <input class="form-control" type="text" name="title" placeholder="Image Title">
                        </div>

                        <div class="form-group col-md-12">
                            <select class="form-control" name="slideLink" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                <option disabled selected>Choose Product Link</option>
                                <?php if(isset($productsModel)) : foreach ($productsModel AS $pro) :?>
                                <option value="<?php echo url('product/view/'.$pro->id. '/'. rawurldecode(str_replace(' ', '-',$pro->name)) ) ?>"><?php echo $pro->name?></option>
                                <?php endforeach; endif;  ?>
                            </select>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-md-6">
                            <select class="form-control" name="slideHint">
                                    <option disabled selected>Choose Main Slide</option>
                                    <option value="1">Main Slide 850*350</option>
                                    <option value="2">Repeat Slider 350*350</option>
                                    <option value="3">Tow Slide 750*120</option>
                                    <option value="4">Some Product 150*150</option>
                                    <option value="5">For Sliders Shop Now 300*125</option>
                                    <option value="6">Five Tabs Large 815*400</option>
                                    <option value="7">Five Tabs Small 190*190</option>
                                    <option value="8">Tow Product 250*250</option>
                                    <option value="9">Navbar Product 350*500</option>
                                    <option value="10">Navbar Slide Product 700*100</option>
                                    <option value="11">Product Filter Top 1200*140</option>
                                    <option value="12">Product Filter Right 300*800</option>
                                    <option value="13">All Category And Sub Category Right 300*400</option>
                                    <option value="14">All Brand</option>
                                    <option value="15">Five - 2 Tabs Large 815*400</option>
                                    <option value="16">Five - 2 Tabs Small 190*190</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" type="file"  name="image"  >
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button id="addSlide" class="btn btn-primary addSlide"><?php echo isset($buttonTitle) ? $buttonTitle : '';?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
