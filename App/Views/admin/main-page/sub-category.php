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

           <?php if (isset($subcategories)) :
                foreach ($subcategories AS $subcategory) : ?>
                    <div class="categoryItems">

                       <div class="categoryImage">
                           <img src="<?php echo assets('images/'. $subcategory->image) ?>" alt="<?php echo $subcategory->name ?>">
                       </div>
                       <div class="categoryInfo">

                           <a href="<?php echo url('main-category/filter/'. $subcategory->id. '/' . rawurlencode(str_replace(' ', '-',$subcategory->name)))?>"><h2><?php echo $subcategory->name ?></h2></a>

                       </div>

                    </div>
                <?php endforeach;
           endif;?>

<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->
<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->
<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->
<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->
<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->
<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->
<!--           <div class="categoryItems">-->
<!---->
<!--               <div class="categoryImage">-->
<!--                   <img src="https://placeimg.com/1200/851/any" alt="">-->
<!--               </div>-->
<!--               <div class="categoryInfo">-->
<!--                   <a href=""><h2> مزيد من التفاصيل</h2></a>-->
<!--               </div>-->
<!---->
<!--           </div>-->


       </div>
   </div>
</div>