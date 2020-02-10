<?php

namespace System;

class Html
{
     /**
     * Application Object
     *
     * @var \System\Application
     */
    protected $app;

     /**
     * Html Title
     *
     * @var string
     */
    private $title;

     /**
     * Html description
     *
     * @var string
     */
    private $description;

     /**
     * Html keywords
     *
     * @var string
     */
    private $keywords;


    /**
     * Html image
     *
     * @var string
     */
    private $image;

    /**
     * Html visitor
     *
     * @var string
     */
    private $visitor;


    private $price;
    private $brand;
    private $brandImage;
    private $brandName;
    private $brandUrl;
    private $brandDescription;
    private $brandVisitor;
    private $brandLogo;
    private $brandPage;


    private $productName;
    private $productDescription;
    private $productImage;
    private $productUrl;
    private $productVisitor;
    private $productCategory;
    private $productDate;
    private $productPrice;
    private $productId;
    private $productPriceCurrency;


    private $homeName;
    private $homeDescription;
    private $homeImage;
    private $homeLogo;
    private $homeVisitor;
    private $thisHome;
    private $thisCategoryPage;


    private $subName;
    private $subImage;
    private $subUrl;
    private $subDsc;
    private $subVisitor;

    private $mainName;
    private $mainImage;
    private $mainUrl;
    private $mainDsc;
    private $mainVisitor;

    private $filterName;
    private $filterImage;
    private $filterUrl;
    private $filterDsc;
    private $filterVisitor;

    private $subPage;
    private $mainPage;
    private $filterPage;

    /**
     * @return mixed
     */
    public function getSubPage()
    {
        return $this->subPage;
    }

    /**
     * @param mixed $subPage
     */
    public function setSubPage($subPage): void
    {
        $this->subPage = $subPage;
    }

    /**
     * @return mixed
     */
    public function getMainPage()
    {
        return $this->mainPage;
    }

    /**
     * @param mixed $mainPage
     */
    public function setMainPage($mainPage): void
    {
        $this->mainPage = $mainPage;
    }

    /**
     * @return mixed
     */
    public function getFilterPage()
    {
        return $this->filterPage;
    }

    /**
     * @param mixed $filterPage
     */
    public function setFilterPage($filterPage): void
    {
        $this->filterPage = $filterPage;
    }

     /**
     * Constructor
     *
     * @param \System\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

     /**
     * Set Title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

     /**
     * Get Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

     /**
     * Set Keywords
     *
     * @param string $keywords
     * @return void
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

     /**
     * Get Keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

     /**
     * Set Description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

     /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Description
     *
     * @param string $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }


    public function setVisitors($visitor)
    {
        $this->visitor = $visitor;
    }


    public function getVisitors()
    {
        return $this->visitor;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getBrandImage()
    {
        return $this->brandImage;
    }

    /**
     * @param mixed $brandImage
     */
    public function setBrandImage($brandImage): void
    {
        $this->brandImage = $brandImage;
    }

    /**
     * @return mixed
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * @param mixed $brandName
     */
    public function setBrandName($brandName): void
    {
        $this->brandName = $brandName;
    }

    /**
     * @return mixed
     */
    public function getBrandUrl()
    {
        return $this->brandUrl;
    }

    /**
     * @param mixed $brandUrl
     */
    public function setBrandUrl($brandUrl): void
    {
        $this->brandUrl = $brandUrl;
    }

    /**
     * @return mixed
     */
    public function getBrandDescription()
    {
        return $this->brandDescription;
    }

    /**
     * @param mixed $brandDescription
     */
    public function setBrandDescription($brandDescription): void
    {
        $this->brandDescription = $brandDescription;
    }

    /**
     * @return mixed
     */
    public function getBrandVisitor()
    {
        return $this->brandVisitor;
    }

    /**
     * @param mixed $brandVisitor
     */
    public function setBrandVisitor($brandVisitor): void
    {
        $this->brandVisitor = $brandVisitor;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * @param mixed $productDescription
     */
    public function setProductDescription($productDescription): void
    {
        $this->productDescription = $productDescription;
    }

    /**
     * @return mixed
     */
    public function getProductImage()
    {
        return $this->productImage;
    }

    /**
     * @param mixed $productImage
     */
    public function setProductImage($productImage): void
    {
        $this->productImage = $productImage;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getProductVisitor()
    {
        return $this->productVisitor;
    }

    /**
     * @param mixed $productVisitor
     */
    public function setProductVisitor($productVisitor): void
    {
        $this->productVisitor = $productVisitor;
    }

    /**
     * @return mixed
     */
    public function getProductUrl()
    {
        return $this->productUrl;
    }

    /**
     * @param mixed $productUrl
     */
    public function setProductUrl($productUrl): void
    {
        $this->productUrl = $productUrl;
    }

    /**
     * @return mixed
     */
    public function getBrandLogo()
    {
        return $this->brandLogo;
    }

    /**
     * @param mixed $brandLogo
     */
    public function setBrandLogo($brandLogo): void
    {
        $this->brandLogo = $brandLogo;
    }

    /**
     * @return mixed
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * @param mixed $productCategory
     */
    public function setProductCategory($productCategory): void
    {
        $this->productCategory = $productCategory;
    }

    /**
     * @return mixed
     */
    public function getProductDate()
    {
        return $this->productDate;
    }

    /**
     * @param mixed $productDate
     */
    public function setProductDate($productDate): void
    {
        $this->productDate = $productDate;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * @param mixed $productPrice
     */
    public function setProductPrice($productPrice): void
    {
        $this->productPrice = $productPrice;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductPriceCurrency()
    {
        return $this->productPriceCurrency;
    }

    /**
     * @param mixed $productPriceCurrency
     */
    public function setProductPriceCurrency($productPriceCurrency): void
    {
        $this->productPriceCurrency = $productPriceCurrency;
    }

    /**
     * @return mixed
     */
    public function getBrandPage()
    {
        return $this->brandPage;
    }

    /**
     * @param mixed $brandPage
     */
    public function setBrandPage($brandPage): void
    {
        $this->brandPage = $brandPage;
    }

    /**
     * @return mixed
     */
    public function getHomeName()
    {
        return $this->homeName;
    }

    /**
     * @param mixed $homeName
     */
    public function setHomeName($homeName): void
    {
        $this->homeName = $homeName;
    }

    /**
     * @return mixed
     */
    public function getHomeDescription()
    {
        return $this->homeDescription;
    }

    /**
     * @param mixed $homeDescription
     */
    public function setHomeDescription($homeDescription): void
    {
        $this->homeDescription = $homeDescription;
    }

    /**
     * @return mixed
     */
    public function getHomeImage()
    {
        return $this->homeImage;
    }

    /**
     * @param mixed $homeImage
     */
    public function setHomeImage($homeImage): void
    {
        $this->homeImage = $homeImage;
    }

    /**
     * @return mixed
     */
    public function getHomeLogo()
    {
        return $this->homeLogo;
    }

    /**
     * @param mixed $homeLogo
     */
    public function setHomeLogo($homeLogo): void
    {
        $this->homeLogo = $homeLogo;
    }

    /**
     * @return mixed
     */
    public function getHomeVisitor()
    {
        return $this->homeVisitor;
    }

    /**
     * @param mixed $homeVisitor
     */
    public function setHomeVisitor($homeVisitor): void
    {
        $this->homeVisitor = $homeVisitor;
    }

    /**
     * @return mixed
     */
    public function getThisHome()
    {
        return $this->thisHome;
    }

    /**
     * @param mixed $thisHome
     */
    public function setThisHome($thisHome): void
    {
        $this->thisHome = $thisHome;
    }

    /**
     * @return mixed
     */
    public function getThisCategoryPage()
    {
        return $this->thisCategoryPage;
    }

    /**
     * @param mixed $thisCategoryPage
     */
    public function setThisCategoryPage($thisCategoryPage): void
    {
        $this->thisCategoryPage = $thisCategoryPage;
    }

    /**
     * @return mixed
     */
    public function getMainName()
    {
        return $this->mainName;
    }

    /**
     * @param mixed $mainName
     */
    public function setMainName($mainName): void
    {
        $this->mainName = $mainName;
    }

    /**
     * @return mixed
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }

    /**
     * @param mixed $mainImage
     */
    public function setMainImage($mainImage): void
    {
        $this->mainImage = $mainImage;
    }

    /**
     * @return mixed
     */
    public function getMainUrl()
    {
        return $this->mainUrl;
    }

    /**
     * @param mixed $mainUrl
     */
    public function setMainUrl($mainUrl): void
    {
        $this->mainUrl = $mainUrl;
    }

    /**
     * @return mixed
     */
    public function getMainDsc()
    {
        return $this->mainDsc;
    }

    /**
     * @param mixed $mainDsc
     */
    public function setMainDsc($mainDsc): void
    {
        $this->mainDsc = $mainDsc;
    }

    /**
     * @return mixed
     */
    public function getMainVisitor()
    {
        return $this->mainVisitor;
    }

    /**
     * @param mixed $mainVisitor
     */
    public function setMainVisitor($mainVisitor): void
    {
        $this->mainVisitor = $mainVisitor;
    }

    /**
     * @return mixed
     */
    public function getFilterName()
    {
        return $this->filterName;
    }

    /**
     * @param mixed $filterName
     */
    public function setFilterName($filterName): void
    {
        $this->filterName = $filterName;
    }

    /**
     * @return mixed
     */
    public function getFilterImage()
    {
        return $this->filterImage;
    }

    /**
     * @param mixed $filterImage
     */
    public function setFilterImage($filterImage): void
    {
        $this->filterImage = $filterImage;
    }

    /**
     * @return mixed
     */
    public function getFilterUrl()
    {
        return $this->filterUrl;
    }

    /**
     * @param mixed $filterUrl
     */
    public function setFilterUrl($filterUrl): void
    {
        $this->filterUrl = $filterUrl;
    }

    /**
     * @return mixed
     */
    public function getFilterDsc()
    {
        return $this->filterDsc;
    }

    /**
     * @param mixed $filterDsc
     */
    public function setFilterDsc($filterDsc): void
    {
        $this->filterDsc = $filterDsc;
    }

    /**
     * @return mixed
     */
    public function getFilterVisitor()
    {
        return $this->filterVisitor;
    }

    /**
     * @param mixed $filterVisitor
     */
    public function setFilterVisitor($filterVisitor): void
    {
        $this->filterVisitor = $filterVisitor;
    }


    /**
     * @return string
     */
    public function getVisitor(): string
    {
        return $this->visitor;
    }

    /**
     * @param string $visitor
     */
    public function setVisitor(string $visitor): void
    {
        $this->visitor = $visitor;
    }

    /**
     * @return mixed
     */
    public function getSubName()
    {
        return $this->subName;
    }

    /**
     * @param mixed $subName
     */
    public function setSubName($subName): void
    {
        $this->subName = $subName;
    }

    /**
     * @return mixed
     */
    public function getSubImage()
    {
        return $this->subImage;
    }

    /**
     * @param mixed $subImage
     */
    public function setSubImage($subImage): void
    {
        $this->subImage = $subImage;
    }

    /**
     * @return mixed
     */
    public function getSubUrl()
    {
        return $this->subUrl;
    }

    /**
     * @param mixed $subUrl
     */
    public function setSubUrl($subUrl): void
    {
        $this->subUrl = $subUrl;
    }

    /**
     * @return mixed
     */
    public function getSubDsc()
    {
        return $this->subDsc;
    }

    /**
     * @param mixed $subDsc
     */
    public function setSubDsc($subDsc): void
    {
        $this->subDsc = $subDsc;
    }

    /**
     * @return mixed
     */
    public function getSubVisitor()
    {
        return $this->subVisitor;
    }

    /**
     * @param mixed $subVisitor
     */
    public function setSubVisitor($subVisitor): void
    {
        $this->subVisitor = $subVisitor;
    }



}