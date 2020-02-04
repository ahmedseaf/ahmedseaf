<nav class="navbarContainer mb-2">
    <div class="navContainer">
        <div class="dropdownBackground">
            
        </div>
        <div class="navMenu">

            <div class="navLogo">
                <img src="https://placeimg.com/150/52/any" alt="">
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
                                   <a href=""><h3>من نحن</h3></a>
                               </div>
                               <div class="productCards">
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/350/500/any" alt=""></div></a>
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/350/501/any" alt=""></div></a>
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/351/500/any" alt=""></div></a>
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
                                       <a href="#"><div class="categoryInfo"><h2><?php echo $subCategory->name?></h2></div></a>
                                   <?php endforeach; endif; ?>
                               </div>

                                <div class="productSlid">
                                    <a href="#"><div class="productSlideImage"><img src="https://placeimg.com/700/100/any" alt=""></div></a>
                                </div>
                               <div class="productCards">
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/350/500/any" alt=""></div></a>
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/350/501/any" alt=""></div></a>
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/351/500/any" alt=""></div></a>
                                   <a href="#"><div class="productCard"><img src="https://placeimg.com/350/502/any" alt=""></div></a>
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
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/450/260/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                   <a href="#"><div class="brandImg"><img src="https://placeimg.com/100/60/any" alt=""></div></a>
                                </div>
                                <div class="brandCard">
                                    <a href="#"><div class="brandItem"><img src="https://placeimg.com/151/200/any" alt=""></div></a>
                                    <a href="#"><div class="brandItem"><img src="https://placeimg.com/150/202/any" alt=""></div></a>
                                    <a href="#"><div class="brandItem"><img src="https://placeimg.com/150/201/any" alt=""></div></a>
                                </div>

                            </div>
                            </div>
                    </li>





                    <li>
                        <a class="mainLink" href="#">اتصل بنا</a>
                        <div class="dropdown services" style="width: 350px">
                        <p>Lorem ipsum dolor sit amet.</p>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p>Lorem ipsum dolor sit amet.</p>
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
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            
        </div> <!-- End NavMenu -->
    </div> <!-- End Nav Container -->
</nav>

<!-- End Navbar -->
