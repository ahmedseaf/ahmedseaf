<div class="container" style="direction: rtl">
    <?php if (isset($productFiltersTop)) : foreach ($productFiltersTop AS $adsTop) : ?>
        <a href="<?php echo $adsTop->link?>"><img src="<?php echo assets('/images/'.$adsTop->image)?>" alt="<?php echo $adsTop->title?>"></a>
    <?php endforeach; endif;?>
    <div class="contactContainer">
        <div class="contactInfo">
            <div class="aboutTitle" style="text-align: center; color: var(--main-color)"><h1>نسعد باتصالك بنا</h1></div>
            <div class="aboutCard">
                <?php if(isset($ourInfo)) : foreach ($ourInfo AS $info) : ?>
                    <i class="fas fa-home"></i>
                    <div><p><?php echo $info->address?></p></div>

                    <i class="fas fa-mobile-alt"></i>
                    <div><p><?php echo $info->mobile1?></p></div>

                    <i class="fas fa-mobile-alt"></i>
                    <div><p><?php echo $info->mobile2?></p></div>

                    <i class="fas fa-phone-volume"></i>
                    <div><p><?php echo $info->phone1?></p></div>

                    <i class="fas fa-phone-volume"></i>
                    <div><p><?php echo $info->phone2?></p></div>

                    <i class="fas fa-fax"></i>
                    <div><p><?php echo $info->fax?></p></div>

                    <i class="fas fa-at"></i>
                    <div><a href="mailto:<?php echo $info->email?>"><p><?php echo $info->email?></a></div>

                    <i class="fas fa-globe"></i>
                    <div><a href="<?php echo $info->web?>"><p><?php echo $info->web?></p></a></div>
                <?php endforeach; endif;?>

            </div>

        </div>


        <div class="contactInput">
            <form action="<?php echo url('/contact/message')?>" method="post" id="contactForm">
                <div class="resultContact" id="resultContact"><p></p></div>
                <div class="contactInputContainer">
                    <div class="form-control-input">

                        <input type="email" name="email" id="emailContact" required autocomplete="off">
                        <label for="email">البريد الالكترونى</label>
                    </div>

                    <div class="form-control-input">
                        <input type="text" name="name" id="name" required autocomplete="off">
                        <label for="name">اسم العميل</label>
                    </div>
                    <div class="form-control-input">
                        <input type="text" name="phone" id="phone" required autocomplete="off">
                        <label for="phone">رقم الهاتف</label>
                    </div>
                    <div class="form-control-input">
                        <select name="subject" id="subject">
                            <option selected disabled>موضوع الرسالة</option>
                            <option value="استعلام">استعلام عن منتج</option>
                            <option value="طلب">طلب منتج معين</option>
                            <option value="شكوى">شكوى</option>
                        </select>
                    </div>


                    <div class="form-control-text">
                        <label for="message" style="padding: 20px">محتوى الرسالة</label>
                        <textarea name="message" id="message" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-control-input">
                        <input type="number" name="code" id="contactCode" value="<?php echo $code?>" disabled>
                        <input type="hidden" name="validCode"  value="<?php echo $code?>" >
                        <label for="code"></label>
                    </div>

                    <div class="form-control-input">
                        <input type="number" name="reCode" value="" id="reCode" required >
                        <label for="reCode">ادخل نفس الكود</label>
                    </div>


                    <div class="submit">
                        <input type="submit" name="submitContact" id="submitContact" value="ارسال الرسالة">
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>