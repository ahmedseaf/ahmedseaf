<div class="container" style="direction: rtl">
    <?php if (isset($productFiltersTop)) : foreach ($productFiltersTop AS $adsTop) : ?>
        <a href="<?php echo $adsTop->link?>"><img src="<?php echo assets('/images/'.$adsTop->image)?>" alt="<?php echo $adsTop->title?>"></a>
    <?php endforeach; endif;?>
    <div class="aboutContainer">

        <div class="aboutInfo">
            <div class="aboutTitle" style="text-align: center; color: var(--main-color)"><h1>حول شركة الحرية للتوريدات</h1></div>
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
        <div class="aboutLogo">
            <div class="aboutLogoContainer">
                <?php if(isset($companyLogo)) : foreach ($companyLogo AS $logo) : ?>
                <div class="aboutImage"><img src="<?php echo assets('/images/'.$logo->image)?>" alt="<?php echo $logo->name?>"></div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>