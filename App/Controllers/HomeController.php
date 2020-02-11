<?php 

namespace App\Controllers;

use System\Controller;
use Whoops\Util\TemplateHelper;

/**
 * @property mixed load
 * @property mixed html
 * @property mixed view
 * @property mixed webLayout
 * @property mixed url
 * @property mixed request
 * @property mixed session
 */
class HomeController extends Controller
{
    public function index()
    {
       // pre($_SERVER);
        $settings = $this->load->model('Setting')->all();
        $settingsSEO = $this->ToArray($settings);
        $counter = $settingsSEO['visitor'] + 1;
        $this->load->model('Home')->visitors(' setting ' ,$counter, 1);

        $siteName           = $this->html->setHomeName($settingsSEO['site_name']);
        $siteDescription    = $this->html->setHomeDescription($settingsSEO['site_description']);
        $siteImage          = $this->html->setHomeImage($this->url->link('public/images/'.$settingsSEO['image_header']));
        $siteLogo           = $this->html->setHomeLogo($this->url->link('public/images/'.$settingsSEO['logo']));
        $siteVisitor        = $this->html->setHomeVisitor($settingsSEO['visitor']);
        $siteHome           = $this->html->setThisHome('siteHome');

        $data['bestOffers']         = $this->load->model('Home')->bestOffer(30);
        $data['newProducts']         = $this->load->model('Home')->newProducts(30);

        $data['mainSliders']        = $this->load->model('Home')->loadSliders(1, 6);
        $data['repeatSliders']      = $this->load->model('Home')->loadSliders(2, 7);
        $data['towSliders']         = $this->load->model('Home')->loadSliders(3, 2);
        $data['someSliders']        = $this->load->model('Home')->loadSliders(4, 8);
        $data['foreSliders']        = $this->load->model('Home')->loadSliders(5, 4);
        $data['fiveLargeSliders']   = $this->load->model('Home')->loadSliders(6, 1);
        $data['fiveSmallSliders']   = $this->load->model('Home')->loadSliders(7, 4);

        $data['fiveLargeSliders2']   = $this->load->model('Home')->loadSliders(15, 1);
        $data['fiveSmallSliders2']   = $this->load->model('Home')->loadSliders(16, 4);

        $data['towProducts']        = $this->load->model('Home')->loadSliders(8, 2);
        $data['faveProducts']        = $this->load->model('Home')->getFaveProduct(30);
        $data['machineProducts']        = $this->load->model('Home')->getProductByCategory(1, 30);
        $data['handProducts']        = $this->load->model('Home')->getProductByCategory(13, 30);

        $title  = $this->html->setTitle('شركة الحرية للتوريدات');
        $view   = $this->view->render('home', $data);
        return $this->webLayout->render($view, $title, $siteName, $siteHome, $siteDescription, $siteImage, $siteLogo, $siteVisitor);
    }

    public function productView($productId)
    {


        $productModel = $this->load->model('Home')->getProductById($productId);
        if(count($productModel) == 0) {
            return $this->productComingSoon();

        }

        $productSEO = $this->ToArray($productModel);

        $counter = $productSEO['visitor'] + 1 ;
        $this->load->model('Home')->visitors(' products ' ,$counter, $productId);


        $data['options'] = $this->load->model('Products')->getOptions($productId);
        $data['images'] = $this->load->model('Products')->getAllImage($productId);
        $data['productsView'] = $this->load->model('Home')->getProductById($productId);

        $userIp = $_SERVER['SERVER_ADDR'];
        $countProduct = $this->load->model('Home')->userProduct($productId);
        if(count($countProduct) == 0 ){
            $this->db->data('ip', $userIp)
                ->data('product_id', $productId)
                ->insert('user_product');
        }



        $data['seeBefore'] = $this->load->model('Home')->getSeeBeforeProduct($userIp) ;


        $productName = $this->load->model('Home')->getProductById($productId);
        $productName = $this->ToArray($productName);
        $proName = $productName['name'];


        $productBrand = $productName['brandId'];

        $data['likeProducts'] = $this->load->model('Home')->getLikeProduct($proName);
        $data['likeBrands'] = $this->load->model('Home')->likeBrand($productBrand);


        $productSEOId           = $productSEO['id'] ;
        $productName            = $productSEO['name'] ;


        $productDescription     = str_replace(['<span>','</span>','<h3>','</h3>','<p>','</p>','<br>'], ' ', htmlspecialchars_decode($productSEO['description'])) ;
        $productImage           = $this->url->link('public/images/test/'.$productSEO['Image']) ;
        $productCategory        = $productSEO['minCategory'] ;
        $productPrice           = $productSEO['price'] ;
        $productVisitor         = $productSEO['visitor'] ;
        $productDate            = date('Y-m-d',$productSEO['created_at']) ;
        $productCurrancy        = $productSEO['currency'] ;
        $productUrl             = url('product/view/'.$productSEO['id'] . '/' . rawurldecode(str_replace(' ', '-',$productSEO['name']))) ;


        $productBrandId    = $productSEO['brandId'] ;
        $brandModel        = $this->load->model('Home')->getBrandByProductBrand($productBrandId);
        $brandSEO          = $this->ToArray($brandModel);

        $brandName              = $brandSEO['name'];
        $brandDescription       = $brandSEO['description'];
        $brandLogo              = $this->url->link('public/images/'. $brandSEO['image']);
        $brandImage             = $this->url->link('public/images/'. $brandSEO['image_header']);
        $brandUrl               = url('product/brand/'.$brandSEO['id'] . '/' . rawurldecode(str_replace(' ', '-',$brandSEO['name']))) ;
        $brandVisitor           = $brandSEO['visitor'];


        $proId              =  $this->html->setProductId($productSEOId);
        $proName            =  $this->html->setProductName($productName);
        $proDescription     =  $this->html->setProductDescription($productDescription);
        $proImage           =  $this->html->setProductImage($productImage);
        $proCategory        =  $this->html->setProductCategory($productCategory);
        $proPrice           =  $this->html->setProductPrice($productPrice);
        $proVisitor         =  $this->html->setProductVisitor($productVisitor);
        $proDate            =  $this->html->setProductDate($productDate);
        $proCurrency        =  $this->html->setProductPriceCurrency($productCurrancy);
        $proUrl             =  $this->html->setProductUrl($productUrl);
        $productKeyWord            = $this->html->setKeywords(str_replace(' ', ',', $productSEO['name'])) ;

        $braName            =  $this->html->setBrandName($brandName);
        $braDescription     =  $this->html->setBrandDescription($brandDescription);
        $braImage           =  $this->html->setBrandImage($brandImage);
        $braLogo            =  $this->html->setBrandLogo($brandLogo);
        $braUrl             =  $this->html->setBrandUrl($brandUrl);
        $braVisitor         =  $this->html->setBrandVisitor($brandVisitor);

        $view = $this->view->render('admin/main-page/product',$data);
        $title  = $this->html->setTitle($proName .' - شركة الحرية للتوريدات ');
        return $this->webLayout->render($view, $title, $proId, $proName, $proDescription,
                                        $proImage, $proCategory, $proPrice, $proVisitor, $proDate,
                                        $braName,  $braDescription, $braImage, $braLogo,
                                        $braUrl, $braVisitor, $proCurrency, $proUrl, $productKeyWord);
    }

    public function allCategory()
    {
        $settings = $this->load->model('Setting')->all();
        $settingsSEO = $this->ToArray($settings);
        $counter = $settingsSEO['visitor'] + 1;
        $this->load->model('Home')->visitors(' setting ' ,$counter, 1);

        $siteName           = $this->html->setHomeName($settingsSEO['site_name']);
        $siteDescription    = $this->html->setHomeDescription($settingsSEO['site_description']);
        $siteImage          = $this->html->setHomeImage($settingsSEO['image_header']);
        $siteLogo           = $this->html->setHomeLogo($settingsSEO['logo']);
        $siteVisitor        = $this->html->setHomeVisitor($settingsSEO['visitor']);
        $siteCategory       = $this->html->setThisCategoryPage('siteHomeCategory');


        $data['repeatSliders']              = $this->load->model('Home')->loadSliders(2, 7);
        $data['allCategoryAds']             = $this->load->model('MainPage')->selectBySlideNameNavbar(13, 1);
        $data['allCategory'] = $this->load->model('Home')->getAllCategory();


        $view = $this->view->render('admin/main-page/category', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title, $siteName, $siteCategory,  $siteDescription, $siteImage, $siteLogo, $siteVisitor);
    }

    public function subCategory($subCategoryId)
    {

       $subCategoryModel = $this->load->model('Home')->getAllSubCategory($subCategoryId);
       if(count($subCategoryModel) == 0) {
          return $this->productComingSoon();

        }

        $productSEO = $this->load->model('Home')->getCategoryById($subCategoryId);
        $productSEO = $this->ToArray($productSEO);
        $counter = $productSEO['visitor'] + 1 ;
        $this->load->model('Home')->visitors(' categories ' ,$counter, $subCategoryId);

        $subName        = $this->html->setSubName($productSEO['name']);
        $subDesc        = $this->html->setSubDsc($productSEO['description']);
        $subImage       = $this->html->setSubImage($this->url->link('public/images/'.$productSEO['image']));
        $subVisitor     = $this->html->setSubVisitor($productSEO['visitor']);
        $subUrl         = $this->html->setSubUrl(url('sub-category/filter/'.$productSEO['id'] . '/' . rawurldecode(str_replace(' ', '-',$productSEO['name']))) );
        $subPage        = $this->html->setSubPage('subPage');


        $data['repeatSliders']      = $this->load->model('Home')->loadSliders(2, 7);
        $data['allCategoryAds']        = $this->load->model('MainPage')->selectBySlideNameNavbar(13, 1);

        $data['subcategories'] = $this->load->model('Home')->getAllSubCategory($subCategoryId);
        $view = $this->view->render('admin/main-page/sub-category', $data);
        $title  = $this->html->setTitle( '  شركة الحرية للتوريدات ' . $productSEO['name']);
        return $this->webLayout->render($view, $title, $subPage, $subName, $subDesc, $subImage, $subVisitor, $subUrl );
    }

    public function mainCategory($mainSubCategoryId)
    {

        //pre($this->load->model('Home')->getAllMainSubCategory(15));
        $mainSubCategoryModel = $this->load->model('Home')->getAllMainSubCategory($mainSubCategoryId);


        if(count($mainSubCategoryModel) == 0) {
            return $this->productComingSoon();

        }
        $productSEO = $this->load->model('Home')->getSubCategoryById($mainSubCategoryId);
        $productSEO = $this->ToArray($productSEO);
        $counter = $productSEO['visitor'] + 1 ;
        $this->load->model('Home')->visitors(' sub_category ' ,$counter, $mainSubCategoryId);

        $mainName        = $this->html->setMainName($productSEO['name']);
        $mainDesc        = $this->html->setMainDsc($productSEO['description']);
        $mainImage       = $this->html->setMainImage($this->url->link('public/images/'.$productSEO['image']));
        $mainVisitor     = $this->html->setMainVisitor($productSEO['visitor']);
        $mainUrl         = $this->html->setMainUrl(url('main-category/filter/'.$productSEO['id'] . '/' . rawurldecode(str_replace(' ', '-',$productSEO['name']))) );
        $mainPage        = $this->html->setMainPage('mainPage' );

        $data['mainSubcategories'] = $this->load->model('Home')->getAllMainSubCategory($mainSubCategoryId);
        $data['repeatSliders']      = $this->load->model('Home')->loadSliders(2, 7);
        $data['allCategoryAds']        = $this->load->model('MainPage')->selectBySlideNameNavbar(13, 1);

        $view = $this->view->render('admin/main-page/main-category', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات'. $productSEO['name']);
        return $this->webLayout->render($view, $title, $mainName, $mainPage,  $mainDesc,$mainImage, $mainVisitor, $mainUrl );
    }

    public function productFilter($productId)
    {


        $productModel = $this->load->model('Home')->getProductByMainCategoryId($productId);


        if(count($productModel) == 0) {
            return $this->productComingSoon();

        }

        $productSEO = $this->load->model('Home')->getMainSubCategoryById($productId);
        $productSEO = $this->ToArray($productSEO);
        $counter = $productSEO['visitor'] + 1 ;
        $this->load->model('Home')->visitors(' min_sub_category ' ,$counter, $productId);


        $proFName        = $this->html->setFilterName($productSEO['name']);
        $proFDesc        = $this->html->setFilterDsc($productSEO['description']);
        $proFImage       = $this->html->setFilterImage($this->url->link('public/images/'.$productSEO['image']));
        $proFVisitor     = $this->html->setFilterVisitor($productSEO['visitor']);
        $proFPage        = $this->html->setFilterPage('filterPage');
        $proFUrl         = $this->html->setFilterUrl(url('product/filter/'.$productSEO['id'] . '/' . rawurldecode(str_replace(' ', '-',$productSEO['name']))) );


        $data['productFiltersTop']         = $this->load->model('MainPage')->selectBySlideNameNavbar(11, 1);
        $data['productFiltersRight']        = $this->load->model('MainPage')->selectBySlideNameNavbar(12, 1);

        $data['products'] = $this->load->model('Home')->getProductByMainCategoryId($productId);
        $view = $this->view->render('admin/main-page/product-filter', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات'. $productSEO['name']);
        return $this->webLayout->render($view, $title, $proFName, $proFPage,  $proFDesc, $proFImage, $proFVisitor, $proFUrl);
    }

    private function productComingSoon()
    {
        $view = $this->view->render('admin/main-page/no-product');
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }

    public function getAllProductBrand($brandId)
    {
        $data['repeatSliders']      = $this->load->model('Home')->loadSliders(2, 7);
        $data['allCategoryAds']     = $this->load->model('MainPage')->selectBySlideNameNavbar(13, 1);
        $data['allBrands']          = $this->load->model('Home')->getAllProductByBrandId($brandId);
        $data['brands']             = $this->load->model('Home')->getBrandById($brandId);



        $brandNameModel = $this->load->model('Home')->getAllProductByBrandId($brandId);
        $brandNameModel = $this->ToArray($brandNameModel);

        $brandName = $brandNameModel['brandName'];

        $productSEO = $this->load->model('Home')->getBrandById($brandId);
        $productSEO = $this->ToArray($productSEO);
        $counter = $productSEO['visitor'] + 1 ;
        $this->load->model('Home')->visitors(' brand ' ,$counter, $brandId);


        $productBrandId            = $productSEO['id'] ;
        $brandModel = $this->load->model('Home')->getBrandByProductBrand($productBrandId);
        $brandSEO = $this->ToArray($brandModel);

        $brandName              = $brandSEO['name'];
        $brandDescription       = $brandSEO['description'];
        $brandLogo              = $this->url->link('public/images/'. $brandSEO['image']);
        $brandImage             = $this->url->link('public/images/'. $brandSEO['image_header']);
        $brandUrl               = url('product/brand/'.$brandSEO['id'] . '/' . rawurlencode(str_replace(' ', '-',$brandSEO['name']))) ;
        $brandVisitor           = $brandSEO['visitor'];



        $brandPage            =  $this->html->setBrandPage('brandPage');

        $braName            =  $this->html->setBrandName($brandName);
        $braDescription     =  $this->html->setBrandDescription($brandDescription);
        $braImage           =  $this->html->setBrandImage($brandImage);
        $braLogo            =  $this->html->setBrandLogo($brandLogo);
        $braUrl             =  $this->html->setBrandUrl($brandUrl);
        $braVisitor         =  $this->html->setBrandVisitor($brandVisitor);


        $view = $this->view->render('admin/main-page/brand', $data);
        $title  = $this->html->setTitle($brandName .' شركة الحرية للتوريدات | ');
        return $this->webLayout->render($view, $title, $braName, $braDescription, $braImage,
                                        $braLogo, $braUrl, $braVisitor, $brandPage);

    }

    public function getSiteMap()
    {
        $data['productsModel'] = $this->load->model('Products')->all();
        $view = $this->view->render('admin/main-page/sitemap', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات  ');
        return $this->webLayout->render($view, $title);
    }

    public function test()
    {
        $visitor = $this->session->get('userVisitors');
        $visitor =(array) $visitor;
        pre(count($visitor));

       // pre($this->cookie->get('userVisitors'));

        //$mainSubCategoryModel = $this->load->model('Home')->getMainAndSubCategory(13);
        //$mainSubCategoryModel = (array) $mainSubCategoryModel;
      //  $mainSubCategoryModel =  $this->ToArray($mainSubCategoryModel);
//
//       $maincategory= array_get($mainSubCategoryModel, 'id');
     //  pre($this->load->model('Home')->getProductById(11)) ;
     // pre($this->load->model('Home')->getSeeBeforeProduct($_SERVER['REMOTE_ADDR'])) ;
     //  pre($this->load->model('Products')->getAllImage(11)) ;
        //pre($this->load->model('Home')->getMainAndSubCategory(13));

//        $productName = $this->load->model('Home')->getProductById(11);
//        $productName = $this->load->model('Home')->getBrandById(6);
//        pre($productName);

//        $brandNameModel = $this->load->model('Home')->getAllProductByBrandId(6);
//        $brandNameModel = $this->ToArray($brandNameModel);
//
//        $brandName = $brandNameModel['brandName'];
//        pred($brandName);
//        $productName = $this->ToArray($productName);
//        pre($productName['name']);
       // $productName = (array) $productName;
        //pre(array_get($productName, 'id'));
//        $word = 'welcome Ahmed';
//        $word = substr($word, 0, 9);
//        echo $word;


    }

}