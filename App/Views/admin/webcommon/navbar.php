<nav class="navbarContainer mb-2">
    <div class="navContainer">
        <div class="dropdownBackground">
            
        </div>
        <div class="navMenu">

            <div class="navLogo">
                <img src="<?php echo $logo?>" alt="">
            </div>


            <div class="navMega">
                <ul class="ulMenu">
                    <!----------------- Start Home In Navbar  -------------------------- -->

                    <li>
                        <a class="mainLink active" href="<?php echo url('/')?>">الرئيسية</a>
                        <div class="dropdown home">
                           <div class="homeMvc">
                               <div class="allCategory">
                                   <a href="<?php echo url('/category/all')?>"><h3>الاقسام</h3></a>
                                   <a href="<?php echo url('/about/us')?>"><h3>من نحن</h3></a>
                               </div>
                               <div class="productCards">
                                   <?php if(isset($homeCards)) : foreach ($homeCards AS $homeCard) : ?>
                                   <a href="<?php echo $homeCard->link?>"><div class="productCard"><img src="<?php echo assets('images/'.$homeCard->image)?>" alt="<?php echo $homeCard->title?>"></div></a>

                                    <?php endforeach; endif; ?>
                               </div>
                           </div>
                         
                        </div>
                    </li>

                    <!----------------- Start Product In Navbar  -------------------------- -->

                    <li>
                        <a class="mainLink" href="#">فئات المنتجات</a>
                         <div class="dropdown product">
                           <div class="productContainer">

                               <div class="productCategory">
                                   <?php if(isset($subCategories)) : foreach ($subCategories As $subCategory) : ?>
                                       <div class="categoryImage"><img src="<?php echo assets('images/'. $subCategory->image)?>" alt="<?php echo $subCategory->name?>"></div>
                                       <a href="<?php echo url('/sub-category/filter/'.$subCategory->category_id. '/filter')?>"><div class="categoryInfo"><h2><?php echo $subCategory->name?></h2></div></a>
                                   <?php endforeach; endif; ?>
                               </div>

                                <div class="productSlid">
                                    <?php if(isset($navSlides)) : foreach ($navSlides As $navSlide) : ?>
                                        <a href="<?php echo $navSlide->link?>"><div class="productSlideImage"><img src="<?php echo assets('images/'. $navSlide->image)?>" alt="<?php echo $navSlide->title?>"></div></a>
                                    <?php endforeach; endif; ?>
                                </div>
                               <div class="productCards">
                                   <?php if(isset($productCards)) : foreach ($productCards As $productCard) : ?>

                                   <a href="<?php echo $productCard->link?>"><div class="productCard"><img src="<?php echo assets('images/'. $productCard->image)?>" alt="<?php echo $productCard->title?>"></div></a>

                                   <?php endforeach; endif; ?>

                               </div>
                           </div>
                        </div>
                    </li>

                        <!----------------- Start Brand In Navbar  -------------------------- -->
                    <li>
                        <a class="mainLink" href="#">العلامات التجارية</a>
                        <div class="dropdown brand">
                            <div class="brandMega">
                                <div class="brandImages">
                                    <?php if(isset($brands)) : foreach ($brands As $brand) : ?>
                                    <a href="<?php echo url('product/brand/'.$brand->id . '/' . rawurlencode(str_replace(' ', '-',$brand->name)));?>"><div class="brandImg"><img src="<?php echo assets('images/'. $brand->image)?>" alt="<?php echo $brand->name?>"></div></a>
                                    <?php endforeach; endif; ?>
                                </div>
                                <div class="brandCard">
                                    <?php if(isset($productCards2)) : foreach ($productCards2 As $productCard) : ?>
                                    <a href="<?php echo $productCard->link?>"><div class="brandItem"><img src="<?php echo assets('images/'. $productCard->image)?>" alt="<?php echo $productCard->title?>"></div></a>

                                    <?php endforeach; endif; ?>
                                </div>

                            </div>
                            </div>
                    </li>





                    <li>
                        <a class="mainLink" href="<?php echo url('/contact/us')?>">اتصل بنا</a>
                        <div class="dropdown services" style="width: 350px">
                        <p style="text-align: center; font-size: 1.3rem">نسعد باتصالك بنا</p>
                        </div>
                    </li>
                </ul>
            </div> <!-- End NavMega -->

            

            <div class="navController">

                <div class="navTheme">
                    <i class="fab fa-affiliatetheme"></i>
                    <div class="theme">
                        <div class="item" data-main-color="#1abb9b"></div>
                        <div class="item" data-main-color="#bb7b1a"></div>
                        <div class="item" data-main-color="#64625e"></div>
                        <div class="item" data-main-color="#a45151"></div>
                        <div class="item" data-main-color="#d7a128"></div>
                        <div class="item" data-main-color="#967f4b"></div>
                        <div class="item" data-main-color="#715109"></div>
                        <div class="item" data-main-color="#6f5f96"></div>
                        <div class="item" data-main-color="#564d6c"></div>
                        <div class="item" data-main-color="#834275"></div>
                        <div class="item" data-main-color="#c93a3a"></div>
                        <div class="item" data-main-color="#e09090"></div>
                        <div class="item" data-main-color="#426e54"></div>
                        <div class="item" data-main-color="#2980aa"></div>
                        <div class="item" data-main-color="#5b8193"></div>
                        <div class="item" data-main-color="#4483b0"></div>
                    </div>
                </div>

                <div class="navSmallMenu">
                    <div class="hiedMenu">
                        <div class="menuSmall">

                            <a href="<?php echo url('/')?>"><h3>الرئيسية</h3></a>
                            <i class="fas fa-home"></i>

                            <a href="<?php echo url('/about/us')?>"><h3>من نحن</h3></a>
                            <i class="fas fa-cannabis"></i>




                            <a href="<?php echo url('/contact/us')?>"><h3>اتصل بنا</h3></a>
                            <i class="far fa-address-card"></i>

                            <a href="<?php echo url('/category/all')?>"><h3>الاقسام الرئيسية</h3></a>
                            <i class="fab fa-buffer"></i>


                            <?php if(isset($subCategories)) : foreach ($subCategories As $subCategory) : ?>
                                <a href="<?php echo url('/sub-category/filter/'.$subCategory->category_id. '/filter')?>"><h3><?php echo $subCategory->name?></h3></a>
                                <i class="fas fa-genderless"></i>
                            <?php endforeach; endif; ?>


                        </div>
                    </div>
                    <div class="iconMenu">
                        <i class="fas fa-bars"></i>
                    </div>

                </div>

                <div class="navSearch">
                    <form action="<?php echo url('/product/search')?>" method="post">
                        <div class="search">
                            <i class="fas fa-search"></i>
                            <input class="inputSearch" data-request="<?php echo url('/product/check')?>"  dir="rtl" type="text" name="search" id="allSearch" autocomplete="off">
                            <input type="hidden" name="check" value="search">
                            <div class="searchFound" id="searchFound"">
<!--                                <p id="searchData"></p>-->

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
        </div> <!-- End NavMenu -->
    </div> <!-- End Nav Container -->
</nav>

<!-- End Navbar -->
