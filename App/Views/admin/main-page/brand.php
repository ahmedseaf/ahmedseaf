<div class="container" style="direction: rtl">
    <?php if (isset($brands)) :
    foreach ($brands AS $allBrand) : ?>
    <div class="brandTitle"><h1><?php echo $allBrand->title?></h1></div>
    <div class="brandHeaders"><img src="<?php echo assets('images/'. $allBrand->image_header) ?>" alt="<?php echo $allBrand->title ?>"></div>
    <div class="logoAndDescription">
        <div class="description"><p><?php echo $allBrand->description?></p></div>
        <div class="logo"><img src="<?php echo assets('images/'. $allBrand->image) ?>" alt="<?php echo $allBrand->name ?>"></div>
    </div>

    <?php endforeach; endif; ?>
</div>

<div class="container" style="direction: rtl">


    <div class="categoryHover"></div>

   <div class="mainCategory">
       <div class="categoryAds">
           <div class="categorySlide">

               <?php if (isset($repeatSliders)) {
                   foreach ($repeatSliders AS $repeatSlider) : ?>
                   <div class="item"><a href="<?php echo $repeatSlider->link; ?>"><img src="<?php echo assets('images/'. $repeatSlider->image) ?>" alt="<?php echo $repeatSlider->title; ?>"></a></div>
               <?php endforeach; } ?>
           </div>

           <div class="categoryImage">
               <?php if (isset($allCategoryAds)) {
               foreach ($allCategoryAds AS $allCategoryAd) : ?>
                   <a href="<?php echo $allCategoryAd->link; ?>"><img src="<?php echo assets('images/'. $allCategoryAd->image) ?>" alt="<?php echo $allCategoryAd->title; ?>"></a>
               <?php endforeach; } ?>
           </div>

       </div>
       <div class="category">


           <?php if (isset($allBrands)) :
               foreach ($allBrands AS $allBrand) : ?>
                   <div class="categoryItems">

                           <div class="categoryImage">
                               <img src="<?php echo assets('images/test/'. $allBrand->Image) ?>" alt="<?php echo $allBrand->name ?>">
                           </div>
                           <div class="categoryInfo">
                               <a href="<?php echo url('product/view/'.$allBrand->id . '/' . rawurlencode(str_replace(' ', '-',$allBrand->name)));?>"><h2> <?php echo $allBrand->name ?></h2></a>
                           </div>

                   </div>
               <?php endforeach; endif; ?>




       </div>
   </div>
</div>