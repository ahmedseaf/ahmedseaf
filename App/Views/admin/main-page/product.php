<div class="container" style="direction: rtl">
    <div class="preLine mb-2" >
    </div>

    <div class="productView">
        <?php if (isset($productsView)) : foreach ($productsView AS $product) : ?>
        <div class="productInformation">
            <div class="lineOne">
                <div class="productTitle">
                    <h1><?php echo $product->name?></h1>
                </div>
                <div class="price"> <?php echo $product->price?> <span><?php echo $product->currency?></span></div>
            </div>

            <div class="lineTow">
                <div class="madeIn"><h6>صنع فى <?php echo $product->country?></h6>   </div>
                <div class="unit"><h6>الوحدة - <?php echo $product->unit?> </h6> </div>
                <div class="status"><h6>متوفر</h6>          </div>
                <div class="discount"><h6><?php echo $product->discount > 0 ? 'خصم  '.$product->discount .'  % ': ' ' ?></h6>     </div>
            </div>

            <div class="lineTree">

                <div class="descriptions">
                    <p><?php echo htmlspecialchars_decode($product->description)?> </p>

                </div>
                <div class="callMe">
                    <i class="fas fa-phone-alt"></i>
                    <div class="phoneNo">01224733621</div>
                </div>

                <div class="pagePrint" onclick="print()">
                    <i class="fas fa-print"></i>

                </div>
            </div>

            <div class="lineFore">
                <div class="productCode" style="display: flex; margin-top: 1rem; margin-bottom: 1rem">
                    <p style=" line-height: 2rem; padding-right: 3rem; font-size: 1.2rem; background-color: var(--main-color); color: white; width: 50%;">  رقم المنتج </p>
                    <p style="width: 50%; background-color: var(--main-color); font-size: 1.2rem; line-height: 2rem; color: white"><?php echo $product->product_code?></p>
                </div>
                <div class="options">Options</div>

                <?php if (isset($options)) : foreach ($options As $option) : ?>
                    <div class="optionsView">
                        <div class="optionKey"><?php echo $option->name?></div>
                        <div class="optionValue"><?php echo $option->description?></div>
                    </div>
                <?php endforeach; endif; ?>

            </div>
        </div>

        <div class="productImage">
            <div class="imageContainer">
                <div class="itemActive">
                    <img src="<?php echo assets('images/test/'.$product->Image)?>" alt="<?php echo $product->name ?>">
                </div>
                <div class="items">
                    <?php if (isset($images)) : foreach ($images As $image) : ?>
                        <img class="<?php echo $image->status == 'enabled' ? 'selected' : ''?>" src="<?php echo assets('images/test/'.$image->name)?>" alt="<?php echo $product->name ?>">
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; endif; ?>
    </div>


    <!-- Start See Before Sliders  -->
    <div class="seeBefore">
        <div class="container">
            <div class="productSliders">
                <div class="slidersTitle">

                        <h4>شاهدت مؤخرا </h4>

                </div>
                <div class="moveControl">
                    <div id="prevSlide6" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
                    <div id="nextSlide6" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
                </div>

                <div class="products products6">


                    <?php if(isset($seeBefore)) : foreach ($seeBefore AS $see) : ?>
                    <div class="product product6">
                        <div class="productFlex">
                            <div class="productImg">
                                <a href="<?php echo url('product/view/'.$see->id . '/' . rawurlencode(str_replace(' ', '-',$see->name)))?>"><img src="<?php echo assets('images/test/'.$see->Image)?>" alt="<?php echo  $see->name?>"></a>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; endif; ?>



                </div>
            </div>
        </div>
    </div>
    <!-- End See Before Sliders  -->



    <!-- Start Like Product Sliders  -->
    <div class="likeProduct">
        <?php if(isset($likeProducts)) : if(count($likeProducts) > 1 ) : ?>
        <div class="container">
            <div class="productSliders">
                <div class="slidersTitle">
                    <h4>منتجات شبيهة</h4>
                </div>

                <div class="moveControl">
                    <div id="prevSlide7" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
                    <div id="nextSlide7" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
                </div>

                <div class="products products7" >


                    <?php if (isset($likeProducts)) : foreach ($likeProducts As $likeProduct) : ?>
                        <div class="product product7" >
                        <div class="productFlex">
                            <div class="productImg">
                                <img src="<?php  echo assets('images/test/'. $likeProduct->Image)?>" alt="<?php echo $likeProduct->name?>">
                            </div>
                            <div class="productTitle">
                                <h3><?php echo $likeProduct->name?> </h3>
                            </div>
                            <div class="productStar">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="productPrice">
                                <h3> <?php echo $likeProduct->price?> <span><?php echo $likeProduct->currency?></span></h3>
                            </div>
                            <?php if ($likeProduct->discount > 0) : ?>
                                <div class="productDiscount">
                                    <h4> <?php echo 'خصم  '.$likeProduct->discount .'  % ' ?> </h4>
                                </div>
                            <?php endif; ?>
                            <div class="readMore">
                           <a href="<?php echo url('product/view/'.$likeProduct->id . '/' . rawurlencode(str_replace(' ', '-',$likeProduct->name)));?>"> <h3>مزيد من التفاصيل</h3></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>

                </div>
            </div>
        </div>
        <?php endif; endif; ?>
    </div>
    <!-- End Like Product Sliders  -->


<!--    Start Select Like Brand Random-->

    <div class="likeBrand">
        <?php if(isset($likeBrands)) : if(count($likeBrands) > 1 ) : ?>
        <div class="container">
            <div class="productSliders">
                <div class="slidersTitle">
                    <h4>منتجات تابعة للعلامة التجارية</h4>
                </div>

                <div class="moveControl">
                    <div id="prevSlide8" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
                    <div id="nextSlide8" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
                </div>

                <div class="products products8" >


                    <?php if (isset($likeBrands)) : foreach ($likeBrands As $likeBrand) : ?>
                        <div class="product product7" >
                            <div class="productFlex">
                                <div class="productImg">
                                    <img src="<?php  echo assets('images/test/'. $likeBrand->Image)?>" alt="<?php echo $likeBrand->name?>">
                                </div>
                                <div class="productTitle">
                                    <h3><?php echo $likeBrand->name?> </h3>
                                </div>
                                <div class="productStar">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="productPrice">
                                    <h3> <?php echo $likeBrand->price?> <span><?php echo $likeBrand->currency?></span></h3>
                                </div>
                                <?php if ($likeBrand->discount > 0) : ?>
                                    <div class="productDiscount">
                                        <h4> <?php echo 'خصم  '.$likeBrand->discount .'  % ' ?> </h4>
                                    </div>
                                <?php endif; ?>
                                <div class="readMore">
                                    <a href="<?php echo url('product/view/'.$likeBrand->id . '/' . rawurlencode(str_replace(' ', '-',$likeBrand->name)));?>"> <h3>مزيد من التفاصيل</h3></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>

                </div>
            </div>
        </div>
        <?php endif;  endif;?>
    </div>

<!--    End Select Like Brand Random-->

</div>

