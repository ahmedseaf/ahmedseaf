

<!-- Start Main Sliders After Edit-->
<div class="container">
    <div class="slideContainer">
        <div class="repeatSlide">
            <?php if (isset($repeatSliders)) {
                foreach ($repeatSliders AS $repeatSlider) : ?>
                    <img src="<?php echo assets('images/'. $repeatSlider->image) ?>" alt="<?php echo $repeatSlider->title; ?>">
                <?php endforeach;
            } ?>
        </div>

        <div class="carouselSlide">
            <div class="moveControl">
                <div class="prevSlide"><i class="fas fa-arrow-left"></i></div>
                <div class="nextSlide"><i class="fas fa-arrow-right"></i></div>
            </div>
            <div class="slide">
                <?php if (isset($mainSliders)) {
                    foreach ($mainSliders AS $mainSlider) : ?>
                        <img src="<?php echo assets('images/'. $mainSlider->image) ?>" alt="<?php echo $mainSlider->title; ?>">
                    <?php endforeach;
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Main Sliders After Edit-->




<!--Start Shop Now -->
<div class="container">
    <div class="shopNow">
        <?php if (isset($towSliders)) {
        foreach ($towSliders AS $towSlider) : ?>
        <div class="styleShopNow">
            <img src="<?php echo assets('images/'. $towSlider->image) ?>" alt="<?php echo $towSlider->title; ?>">
        </div>
        <?php endforeach;
        } ?>
    </div>
</div>
<!--End Shop Now -->


<!-- Start Card -->
<div class="cards">
    <?php if (isset($someSliders)) {
        foreach ($someSliders AS $someSlider) : ?>
        <div class="card">
            <div class="cardImg">
                <img src="<?php echo assets('images/'. $someSlider->image) ?>" alt="<?php echo $someSlider->title; ?>">
            </div>
        </div>
       <?php endforeach;
    } ?>
</div>
<!-- End Card -->




<!--Start fore slide shop now -->

<div class="container">
    <div class="foreSlideFlex">
        <?php if (isset($foreSliders)) {
              foreach ($foreSliders AS $foreSlider) : ?>
              <div class="foreSlide">
                    <a href="#">  <img src="<?php echo assets('images/'. $foreSlider->image) ?>" alt="<?php echo $foreSlider->title; ?>"> </a>
              </div>
             <?php endforeach;
        } ?>
    </div>
</div>
<!--End fore slide shop now -->




<!-- Start Tap Five Items -->
<div class="fiveItemsContainer">
    <div class="smallItems">
        <?php if (isset($fiveSmallSliders)) {
            foreach ($fiveSmallSliders AS $fiveSmallSlider) : ?>


        <div class="item4"><a href="#"> <img src="<?php echo assets('images/'. $fiveSmallSlider->image) ?>" alt="<?php echo $fiveSmallSlider->title; ?>"></a></div>
            <?php endforeach;
        } ?>
    </div>
    <div class="largeItem">
        <a href="#">
            <?php if (isset($fiveLargeSliders)) {
                foreach ($fiveLargeSliders AS $fiveLargeSlider) : ?>
                        <img src="<?php echo assets('images/'. $fiveLargeSlider->image) ?>" alt="<?php echo $fiveLargeSlider->title; ?>">
                <?php endforeach;
            } ?>
        </a>

    </div>
</div>
<!-- End Tap Five Items -->


<!-- Start Product Sliders -1  Best Offer -->
<div class="container">
    <div class="productSliders">
        <div class="slidersTitle">
            <h4> عروض وتخفيضات </h4>
        </div>

        <div class="moveControl">
            <div class="prevSlide"><i class="fas fa-arrow-left"></i></div>
            <div class="nextSlide"><i class="fas fa-arrow-right"></i></div>
        </div>

        <div class="products">

            <?php if (isset($bestOffers)) {
                foreach ($bestOffers AS $bestOffer) : ?>
                <div class="product">
                    <div class="productFlex">
                        <div class="productImg">
                            <img src="<?php echo assets('images/test/'. $bestOffer->Image) ?>" alt="<?php echo $bestOffer->name; ?>">
                        </div>
                        <div class="productTitle">
                            <h3> <?php echo $bestOffer->name ; ?></h3>
                        </div>
                        <div class="productStar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="productPrice">
                            <h3>  <?php  echo  $bestOffer->price . ' ' . $bestOffer->currency ;?></h3>
                        </div>
                        <div class="productDiscount">
                            <h4> <?php  echo  ' % '. $bestOffer->discount . ' خصم '; ?>    </h4>
                        </div>
                        <div class="readMore">
                            <a href="<?php echo url('product/' .  $bestOffer->id . '/' . rawurlencode(str_replace(' ', '-',$bestOffer->name))) ?>"><h3>مزيد من التفاصيل</h3></a>
                        </div>
                    </div>
                </div>
                <?php endforeach;
            } ?>
        </div>
    </div>
</div>
<!-- End Product Sliders  -1  Best Offer -->


<!-- Start Product Sliders 2 -->
<div class="container">
    <div class="productSliders">
        <div class="slidersTitle">
            <h4>احدث المنتجات</h4>
        </div>

        <div class="moveControl">
            <div id="prevSlide2" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
            <div id="nextSlide2" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
        </div>

        <div class="products products2" id="products2">


            <?php if (isset($newProducts)) {
                foreach ($newProducts AS $newProduct) : ?>
                    <div class="product product2">
                        <div class="productFlex">
                            <div class="productImg">
                                <img src="<?php echo assets('images/test/'. $newProduct->Image) ?>" alt="<?php echo $newProduct->name; ?>">
                            </div>
                            <div class="productTitle">
                                <h3> <?php echo $newProduct->name ; ?></h3>
                            </div>
                            <div class="productStar">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="productPrice">
                                <h3>  <?php  echo  $newProduct->price . ' ' . $newProduct->currency ;?></h3>
                            </div>
                            <?php if($newProduct->discount != 0) : ?>
                            <div class="productDiscount">
                                <h4> <?php  echo  ' % '. $newProduct->discount . ' خصم '; ?>    </h4>
                            </div>
                            <?php endif;?>
                            <div class="readMore">
                                <h3>مزيد من التفاصيل</h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            } ?>


        </div>
    </div>
</div>
<!-- End Product Sliders 2 -->


<!-- Start Tap Five Items - 2 -->
<div class="fiveItemsContainer">
    <div class="smallItems">
        <?php if (isset($fiveSmallSliders)) {
            foreach ($fiveSmallSliders AS $fiveSmallSlider) : ?>


                <div class="item4"><a href="#"> <img src="<?php echo assets('images/'. $fiveSmallSlider->image) ?>" alt="<?php echo $fiveSmallSlider->title; ?>"></a></div>
            <?php endforeach;
        } ?>
    </div>
    <div class="largeItem">
        <a href="#">
            <?php if (isset($fiveLargeSliders)) {
                foreach ($fiveLargeSliders AS $fiveLargeSlider) : ?>
                    <img src="<?php echo assets('images/'. $fiveLargeSlider->image) ?>" alt="<?php echo $fiveLargeSlider->title; ?>">
                <?php endforeach;
            } ?>
        </a>

    </div>
</div>
<!-- End Tap Five Items - 2 -->





<!-- Start Product Sliders -3 -->
<div class="container">
    <div class="productSliders">
        <div class="slidersTitle">
            <h4>احدث المنتجات</h4>
        </div>

        <div class="moveControl">
            <div id="prevSlide3" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
            <div id="nextSlide3" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
        </div>

        <div class="products" id="products3">
            <div class="product" id="product3">
                <div class="productFlex">
                    <div class="productImg">
                        <img src="https://placeimg.com/200/150/any" alt="">
                    </div>
                    <div class="productTitle">
                        <h3> Welding Machine Lincoln DC</h3>
                    </div>
                    <div class="productStar">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="productPrice">
                        <h3>  جنيه مصري 1200</h3>
                    </div>
                    <div class="productDiscount">
                        <h4>خصم  %10 </h4>
                    </div>
                    <div class="readMore">
                        <h3>مزيد من التفاصيل</h3>
                    </div>
                </div>
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
        </div>
    </div>
</div>
<!-- End Product Sliders -3 -->


<!-- Start Product Sliders -4 -->
<div class="container">
    <div class="productSliders">
        <div class="slidersTitle">
            <h4>احدث المنتجات</h4>
        </div>

        <div class="moveControl">
            <div id="prevSlide4" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
            <div id="nextSlide4" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
        </div>

        <div class="products" id="products4">
            <div class="product" id="product4">
                <div class="productFlex">
                    <div class="productImg">
                        <img src="https://placeimg.com/200/150/any" alt="">
                    </div>
                    <div class="productTitle">
                        <h3> Welding Machine Lincoln DC</h3>
                    </div>
                    <div class="productStar">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="productPrice">
                        <h3>  جنيه مصري 1200</h3>
                    </div>
                    <div class="productDiscount">
                        <h4>خصم  %10 </h4>
                    </div>
                    <div class="readMore">
                        <h3>مزيد من التفاصيل</h3>
                    </div>
                </div>
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
        </div>
    </div>
</div>
<!-- End Product Sliders -4 -->

<!-- Start Product Sliders -5 -->
<div class="container">
    <div class="productSliders">
        <div class="slidersTitle">
            <h4>احدث المنتجات</h4>
        </div>

        <div class="moveControl">
            <div id="prevSlide5" class="prevSlide"><i class="fas fa-arrow-left"></i></div>
            <div id="nextSlide5" class="nextSlide"><i class="fas fa-arrow-right"></i></div>
        </div>

        <div class="products" id="products5">
            <div class="product" id="product5">
                <div class="productFlex">
                    <div class="productImg">
                        <img src="https://placeimg.com/200/150/any" alt="">
                    </div>
                    <div class="productTitle">
                        <h3> Welding Machine Lincoln DC</h3>
                    </div>
                    <div class="productStar">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="productPrice">
                        <h3>  جنيه مصري 1200</h3>
                    </div>
                    <div class="productDiscount">
                        <h4>خصم  %10 </h4>
                    </div>
                    <div class="readMore">
                        <h3>مزيد من التفاصيل</h3>
                    </div>
                </div>
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
            <div class="product">
            </div>
        </div>
    </div>
</div>
<!-- End Product Sliders -5 -->


