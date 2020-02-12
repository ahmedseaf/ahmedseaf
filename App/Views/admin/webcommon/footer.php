

<footer>

    <div class="footerContainer" style="direction: rtl">
        <div class="footerTop">
            <?php if(isset($aboutCompany)) : foreach ($aboutCompany AS $info) :?>
            <div class="logo"><img src="<?php echo assets('images/'.$info->logo)?>" alt="<?php echo $info->site_name?>"></div>
            <div class="about">
                <h4>حول الشركة</h4>
                <p><?php echo $info->site_description ?></p>

            </div>
            <?php endforeach; endif; ?>
        </div>
        <div class="footerBottom">
            <div class="social">
                <a href="#"><img src="<?php echo assets('images/social/d.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/f.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/g.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/i.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/l.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/p.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/t.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/w.png')?>" alt="dribble"></a>
                <a href="#"><img src="<?php echo assets('images/social/y.png')?>" alt="dribble"></a>
            </div>
            <div class="links">
                <div class="goLinks">
                    <p>روابط سريعة</p>
                    <a href="<?php echo url('/category/all')?>"><p>الاقسام الرئيسية</p></a>
                    <a href=" https://wa.me/201224733621?text=welcom"><p>الاقسام الرئيسية</p></a>
                    <a href="<?php echo url('/about/us')?>"><p>حول الشركة</p></a>
                    <a href="<?php echo url('/contact/us')?>"><p>اتصل بنا</p></a>
                </div>
                <div class="phone">
                    <?php if(isset($ourInfo)) : foreach ($ourInfo AS $info) : ?>
                    <i class="fas fa-home"></i>
                    <div><p><?php echo $info->address?></p></div>

                    <i class="fas fa-mobile-alt"></i>
                    <div><p><?php echo $info->mobile1?></p></div>


                    <i class="fas fa-phone-volume"></i>
                    <div><p><?php echo $info->phone1?></p></div>


                    <i class="fas fa-fax"></i>
                    <div><p><?php echo $info->fax?></p></div>

                    <?php endforeach; endif;?>
                </div>
                <div class="copyRight">
                    <p class="copy">	<span>&copy;</span> جميع الحقوق محفوظة لشركة الحرية</p>
                    <p class="design">تم التصميم والبرمجة بواسطة <a href="<?php echo url('/')?>">Ahmed Seaf</a></p>
                </div>
            </div>
        </div>
    </div>


</footer>

<script src="<?php echo assets('dist/js/myJQuery/jquery-1.12.0.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/jquery-ui/jquery-ui.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/moment/moment.min.js') ; ?>"></script>
<script src="<?php echo assets('dist/js/webJs.js') ; ?>"></script>




</body>
</html>
