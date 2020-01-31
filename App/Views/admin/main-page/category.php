<div class="container" style="direction: rtl">
    <div class="preLine mb-2" >
        <h4> <a href="#"> الرئيسية </a>   / <a href="#"> القسم الرئيسى </a> /  <a href="#">  القسم الفرعى </a> </h4>
    </div>

    <div class="categoryHover"></div>

   <div class="mainCategory">
       <div class="categoryAds">
           <div class="categoryImage">
               <a href="#"><img src="https://placeimg.com/300/400/any" alt=""></a>
           </div>
           <div class="categorySlide">
               <div class="item"><a href="#"><img src="https://placeimg.com/300/300/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
               <div class="item"><a href="#"><img src="https://placeimg.com/300/301/any" alt=""></a></div>
           </div>
       </div>
       <div class="category">


           <?php if (isset($allCategory)) :
               foreach ($allCategory AS $category) : ?>
                   <div class="categoryItems">

                           <div class="categoryImage">
                               <img src="<?php echo assets('images/'. $category->image) ?>" alt="<?php echo $category->name ?>">
                           </div>
                           <div class="categoryInfo">
                               <a href="<?php echo url('sub-category/filter/'.$category->id . '/' . rawurlencode(str_replace(' ', '-',$category->name)));?>"><h2> <?php echo $category->name ?></h2></a>
                           </div>

                   </div>
               <?php endforeach;
           endif; ?>




       </div>
   </div>
</div>