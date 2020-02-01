<div class="container" style="direction: rtl">

    <div class="topSlider">
        <a href="#"><img src="https://placeimg.com/1200/140/any" alt=""></a>
    </div>

    <div class="productFilters">
        <div class="rightAds">
            <div class="topImage">
                <a href="#"><img src="https://placeimg.com/300/850/any" alt=""></a>
            </div>
        </div>
        <div class="productFilter">
            <div class="productItems">

                <?php if (isset($products)) : foreach ($products AS $product) : ?>

                <div class="productItem">
                    <div class="item">
                        <div class="itemImage">
                            <img src="<?php echo assets('images/test/'. $product->Image) ?>" alt="">
                        </div>
                        <div class="itemPrice"><h2><?php echo  $product->price ?></h2></div>
                        <a href="<?php echo url('product/view/'.$product->id . '/' . rawurlencode(str_replace(' ', '-',$product->name)));?>"><div class="itemInfo"><?php echo  $product->name ?></div></a>
                    </div>
                </div>

                <?php endforeach; endif;?>


            </div>
        </div>
    </div>


</div>