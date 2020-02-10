<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <title><?php echo isset($title) ? $title : ''?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo isset($fave) ? $fave : '' ;?>"/>
    <meta name="keyword" content="<?php echo str_replace(' ', ',', isset($title) ?  $title : '')?>">

    <?php if(isset($siteHome)) : ?>
        <link rel="canonical" href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']?>" />
        <meta name="description" content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>" />
        <meta property="og:url"             content="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']?>" />
        <meta property="og:title"           content="<?php echo isset($siteName) ? $siteName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($siteImage) ? $siteImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

<!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($siteName) ? $siteName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($siteImage) ? $siteImage : '' ; ?>">
<!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($siteName) ? $siteName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($siteImage) ? $siteImage : '' ; ?>">
    <?php  endif; ?>

    <?php if(isset($siteHomeCategory)) : ?>
        <link rel="canonical" href="<?php url('category/all') ?>" />
        <meta name="description" content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>" />
        <meta property="og:url"             content="<?php url('category/all') ?>" />
        <meta property="og:title"           content="<?php echo isset($siteName) ? $siteName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($siteImage) ? $siteImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

        <!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($siteName) ? $siteName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($siteImage) ? $siteImage : '' ; ?>">
        <!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($siteName) ? $siteName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($siteDescription) ? $siteDescription : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($siteImage) ? $siteImage : '' ; ?>">
    <?php  endif; ?>

    <?php if(isset($proName)) : ?>
        <link rel="canonical" href="<?php echo isset($proUrl) ? $proUrl : '' ; ?>" />
        <meta name="description" content="<?php echo isset($proDescription) ? $proDescription : '' ; ?>" />
        <meta property="og:url"             content="<?php echo isset($proUrl) ? $proUrl : '' ; ?>" />
        <meta property="og:title"           content="<?php echo isset($proName) ? $proName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($proDescription) ? $proDescription : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($proImage) ? $proImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

        <!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($proName) ? $proName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($proDescription) ? $proDescription : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($proImage) ? $proImage : '' ; ?>">
        <!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($proName) ? $proName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($proDescription) ? $proDescription : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($proImage) ? $proImage : '' ; ?>">
    <?php  endif; ?>


    <?php if(isset($brandPage)) : ?>
        <link rel="canonical" href="<?php echo isset($braUrl) ? $braUrl : '' ; ?>" />
        <meta name="description" content="<?php echo isset($braDescription) ? $braDescription : '' ; ?>" />
        <meta property="og:url"             content="<?php echo isset($braUrl) ? $braUrl : '' ; ?>" />
        <meta property="og:title"           content="<?php echo isset($braName) ? $braName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($braDescription) ? $braDescription : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($braImage) ? $braImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

        <!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($braName) ? $braName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($braDescription) ? $braDescription : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($braImage) ? $braImage : '' ; ?>">
        <!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($braName) ? $braName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($braDescription) ? $braDescription : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($braImage) ? $braImage : '' ; ?>">
    <?php  endif; ?>



    <?php if(isset($subPage)) : ?>
        <link rel="canonical" href="<?php echo isset($subUrl) ? $subUrl : '' ; ?>" />
        <meta name="description" content="<?php echo isset($subDesc) ? $subDesc : '' ; ?>" />
        <meta property="og:url"             content="<?php echo isset($subUrl) ? $subUrl : '' ; ?>" />
        <meta property="og:title"           content="<?php echo isset($subName) ? $subName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($subDesc) ? $subDesc : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($subImage) ? $subImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

        <!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($subName) ? $subName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($subDesc) ? $subDesc : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($subImage) ? $subImage : '' ; ?>">
        <!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($subName) ? $subName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($subDesc) ? $subDesc : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($subImage) ? $subImage : '' ; ?>">
    <?php  endif; ?>


    <?php if(isset($mainPage)) : ?>
        <link rel="canonical" href="<?php echo isset($mainUrl) ? $mainUrl : '' ; ?>" />
        <meta name="description" content="<?php echo isset($mainDesc) ? $mainDesc : '' ; ?>" />
        <meta property="og:url"             content="<?php echo isset($mainUrl) ? $mainUrl : '' ; ?>" />
        <meta property="og:title"           content="<?php echo isset($mainName) ? $mainName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($mainDesc) ? $mainDesc : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($mainImage) ? $mainImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

        <!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($mainName) ? $mainName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($mainDesc) ? $mainDesc : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($mainImage) ? $mainImage : '' ; ?>">
        <!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($mainName) ? $mainName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($mainDesc) ? $mainDesc : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($mainImage) ? $mainImage : '' ; ?>">
    <?php  endif; ?>


    <?php if(isset($filterPage)) : ?>
        <link rel="canonical" href="<?php echo isset($filterUrl) ? $filterUrl : '' ; ?>" />
        <meta name="description" content="<?php echo isset($filterDesc) ? $filterDesc : '' ; ?>" />
        <meta property="og:url"             content="<?php echo isset($filterUrl) ? $filterUrl : '' ; ?>" />
        <meta property="og:title"           content="<?php echo isset($filterName) ? $filterName : ''?>" />
        <meta property="og:description"     content="<?php echo isset($filterDesc) ? $filterDesc : '' ; ?>" />
        <meta property="og:image"           content="<?php echo isset($filterImage) ? $filterImage : '' ; ?>" />
        <meta property="og:site_name"       content="شركة الحرية للتوريدات" />
        <meta property="og:country-name"    content="Egypt" />
        <meta property="og:type"            content="product" />

        <!--         Twitter Card data-->
        <meta name="twitter:card"           content="summary">
        <meta name="twitter:site"           content="@el_hurria">
        <meta name="twitter:title"          content="<?php echo isset($filterName) ? $filterName : '' ; ?>">
        <meta name="twitter:description"    content="<?php echo isset($filterDesc) ? $filterDesc : '' ; ?>">
        <meta name="twitter:creator"        content="@El-Hurria Tools">
        <meta name="twitter:image"          content="<?php echo isset($filterImage) ? $filterImage : '' ; ?>">
        <!--         Schema.org markup for Google+-->
        <meta itemprop="name"               content="<?php echo isset($filterName) ? $filterName : '' ; ?>">
        <meta itemprop="description"        content="<?php echo isset($filterDesc) ? $filterDesc : '' ; ?>">
        <meta itemprop="image"              content="<?php echo isset($filterImage) ? $filterImage : '' ; ?>">
    <?php  endif; ?>


    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
    <?php if(isset($proName)) : ?>
      "@type": "Product",
      "url":            "<?php echo isset($proUrl)          ? $proUrl           : '' ; ?>",
      "name":           "<?php echo isset($proName)         ? $proName          : '' ; ?>",
      "image":          "<?php echo isset($proImage)        ? $proImage         : '' ; ?>",
      "description":    "<?php echo isset($proDescription)  ? $proDescription   : '' ; ?>",
      "productID":      "<?php echo isset($proId)           ? $proId            : '' ; ?>",
      "purchaseDate":   "<?php echo isset($proDate)         ? $proDate          : '' ; ?>",
      "category":       "<?php echo isset($proCategory)     ? $proCategory      : '' ; ?>",
      "review":         "<?php echo isset($proVisitor)      ? $proVisitor       : '' ; ?>",
      "offers": {
            "@type": "Offer",
            "availability":     "<?php echo isset($proUrl)              ? $proUrl               : '' ; ?>",
            "price":            "<?php echo isset($proPrice)            ? $proPrice             : '' ; ?>",
            "priceCurrency":    "<?php echo isset($proPriceCurrency)    ? $proPriceCurrency     : '' ; ?>"
                },
      "Brand":  {
            "@type": "Brand",
            "url":          "<?php echo isset($braUrl)          ? $braUrl           : '' ; ?>",
            "name":         "<?php echo isset($braName)         ? $braName          : '' ; ?>",
            "image":        "<?php echo isset($braImage)        ? $braImage         : '' ; ?>",
            "logo":         "<?php echo isset($braLogo)         ? $braLogo          : '' ; ?>",
            "description":  "<?php echo isset($braDescription)  ? $braDescription   : '' ; ?>",
            "review":       "<?php echo isset($braVisitor)      ? $braVisitor       : '' ; ?>",
                }
    <?php endif;?>

    <?php if(isset($brandPage)) : ?>
        "@type": "Brand",
            "url":          "<?php echo isset($braUrl)          ? $braUrl           : '' ; ?>",
            "name":         "<?php echo isset($braName)         ? $braName          : '' ; ?>",
            "image":        "<?php echo isset($braImage)        ? $braImage         : '' ; ?>",
            "logo":         "<?php echo isset($braLogo)         ? $braLogo          : '' ; ?>",
            "description":  "<?php echo isset($braDescription)  ? $braDescription   : '' ; ?>",
            "review":       "<?php echo isset($braVisitor)      ? $braVisitor       : '' ; ?>",
                }
    <?php endif;?>



    <?php if(isset($siteHome)) : ?>
      "@type": "LocalBusiness",
      "name": "<?php echo isset($siteName)  ? $siteName   : '' ; ?>",
      "openingHours": [
            "Mo-Sa 9:00-9:30",
            "Mo-Th 9:00-9:30",
            "Fr-Sa 9:00-9:00"
          ],
      "address": {
        "@type": "PostalAddress",
        "addressLocality":  "Egypt",
        "addressRegion":    "Alexandria",
        "postalCode":       "21519",
        "streetAddress":    "<?php echo isset($address)          ? $address           : '' ; ?>"
        },
      "url":            "<?php echo url('/') ; ?>",
      "image":          "<?php echo isset($siteImage)        ? $siteImage         : '' ; ?>",
      "description":    "<?php echo isset($siteDescription)  ? $siteDescription   : '' ; ?>",
      "logo":           "<?php echo isset($siteLogo)         ? $siteLogo          : '' ; ?>",
      "review":         "<?php echo isset($siteVisitor)      ? $siteVisitor       : '' ; ?>",
      "telephone":      ["002-01224733621", "002-01012098265", "03-4875368"],
    <?php endif;?>


    <?php if(isset($siteHomeCategory)) : ?>
      "@type": "LocalBusiness",
      "name": "<?php echo isset($siteName)  ? $siteName   : '' ; ?>",
      "openingHours": [
            "Mo-Sa 9:00-9:30",
            "Mo-Th 9:00-9:30",
            "Fr-Sa 9:00-9:00"
          ],
      "address": {
            "@type": "PostalAddress",
            "addressLocality":  "Egypt",
            "addressRegion":    "Alexandria",
            "postalCode":       "21519",
            "streetAddress":    "<?php echo isset($address)          ? $address           : '' ; ?>"
            },
      "url":            "<?php echo url('/category/all') ; ?>",
      "image":          "<?php echo isset($siteImage)        ? $siteImage         : '' ; ?>",
      "description":    "<?php echo isset($siteDescription)  ? $siteDescription   : '' ; ?>",
      "logo":           "<?php echo isset($siteLogo)         ? $siteLogo          : '' ; ?>",
      "review":         "<?php echo isset($siteVisitor)      ? $siteVisitor       : '' ; ?>",
      "telephone":      ["002-01224733621", "002-01012098265", "03-4875368"],
    <?php endif;?>


    <?php if(isset($subPage)) : ?>
        "@type": "ItemList",
        "url":          "<?php echo isset($subUrl)      ? $subUrl       : '' ; ?>",
        "name":         "<?php echo isset($subName)     ? $subName      : '' ; ?>",
        "image":        "<?php echo isset($subImage)    ? $subImage     : '' ; ?>",
        "description":  "<?php echo isset($subDesc)     ? $subDesc      : '' ; ?>",
        "review":       "<?php echo isset($subVisitor)  ? $subVisitor   : '' ; ?>",
    <?php endif;?>


    <?php if(isset($mainPage)) : ?>
        "@type": "ItemList",
        "url":          "<?php echo isset($mainUrl)      ? $mainUrl       : '' ; ?>",
        "name":         "<?php echo isset($mainName)     ? $mainName      : '' ; ?>",
        "image":        "<?php echo isset($mainImage)    ? $mainImage     : '' ; ?>",
        "description":  "<?php echo isset($mainDesc)     ? $mainDesc      : '' ; ?>",
        "review":       "<?php echo isset($mainVisitor)  ? $mainVisitor   : '' ; ?>",
    <?php endif;?>

    <?php if(isset($filterPage)) : ?>
        "@type": "ItemList",
        "url":          "<?php echo isset($filterUrl)      ? $filterUrl       : '' ; ?>",
        "name":         "<?php echo isset($filterName)     ? $filterName      : '' ; ?>",
        "image":        "<?php echo isset($filterImage)    ? $filterImage     : '' ; ?>",
        "description":  "<?php echo isset($filterDesc)     ? $filterDesc      : '' ; ?>",
        "review":       "<?php echo isset($filterVisitor)  ? $filterVisitor   : '' ; ?>",
    <?php endif;?>

    }
</script>





    <link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo assets('plugins/fontawesome-free/css/all.min.css') ; ?>">
    <link rel="stylesheet" href="<?php echo assets('dist/css/webStyle.css') ; ?>">

</head>

<body>



