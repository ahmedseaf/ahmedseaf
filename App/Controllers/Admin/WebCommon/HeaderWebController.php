<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\WebCommon;

use System\Controller;

/**
 * @property mixed load
 * @property mixed url
 * @property mixed html
 * @property mixed view
 */
class HeaderWebController extends Controller
{

    public function index()
    {

        //Product Page
        $data['proId']              =  $this->html->getProductId();
        $data['proName']            =  $this->html->getProductName();
        $data['proDescription']     =  $this->html->getProductDescription();
        $data['proImage']           =  $this->html->getProductImage();
        $data['proCategory']        =  $this->html->getProductCategory();
        $data['proPrice']           =  $this->html->getProductPrice();
        $data['proVisitor']         =  $this->html->getProductVisitor();
        $data['proDate']            =  $this->html->getProductDate();
        $data['proPriceCurrency']   =  $this->html->getProductPriceCurrency();
        $data['proUrl']             =  $this->html->getProductUrl();
        $data['proKeyword']         =  $this->html->getKeywords();

        //Brand Page
        $data['brandPage']          =  $this->html->getBrandPage();
        $data['braName']            =  $this->html->getBrandName();
        $data['braDescription']     =  $this->html->getBrandDescription();
        $data['braImage']           =  $this->html->getBrandImage();
        $data['braLogo']            =  $this->html->getBrandLogo();
        $data['braUrl']             =  $this->html->getBrandUrl();
        $data['braVisitor']         =  $this->html->getBrandVisitor();


        // Main Page And CategoryAll
        $data['address']            = 'الاسكندرية - المنشية - 76 شارع ابى الدرداء شركة الحرية';
        $data['siteHome']           = $this->html->getThisHome();
        $data['siteHomeCategory']   = $this->html->getThisCategoryPage();
        $data['siteName']           = $this->html->getHomeName();
        $data['siteDescription']    = $this->html->getHomeDescription();
        $data['siteImage']          = $this->html->getHomeImage();
        $data['siteLogo']           = $this->html->getHomeLogo();
        $data['siteVisitor']        = $this->html->getHomeVisitor();

        // Sub Category Page
        $data['subName']        = $this->html->getSubName();
        $data['subDesc']        = $this->html->getSubDsc();
        $data['subImage']       = $this->html->getSubImage();
        $data['subVisitor']     = $this->html->getSubVisitor();
        $data['subUrl']         = $this->html->getSubUrl();
        $data['subPage']        = $this->html->getSubPage();


        // Main Sub Category Page
        $data['mainName']        = $this->html->getMainName();
        $data['mainDesc']        = $this->html->getMainDsc();
        $data['mainImage']       = $this->html->getMainImage();
        $data['mainVisitor']     = $this->html->getMainVisitor();
        $data['mainUrl']         = $this->html->getMainUrl();
        $data['mainPage']        = $this->html->getMainPage();

        // Filter Product Page
        $data['filterName']        = $this->html->getFilterName();
        $data['filterDesc']        = $this->html->getFilterDsc();
        $data['filterImage']       = $this->html->getFilterImage();
        $data['filterVisitor']     = $this->html->getFilterVisitor();
        $data['filterUrl']         = $this->html->getFilterUrl();
        $data['filterPage']        = $this->html->getFilterPage();



        $data['images'] = $this->html->getImage();
        $settings = $this->load->model('Setting')->all();
        $settings = $this->ToArray($settings);

        $data['logo'] = $this->url->link('public/images/'. $settings['logo']);
        $data['fave'] = $this->url->link('public/images/'. $settings['fave_icon']);


        $data['title'] = $this->html->getTitle();
        $data['settings'] = $this->load->model('Setting')->all();
        return $this->view->render('/admin/webcommon/header', $data);
    }


    public function test()
    {

        $word = 'bosch grending 7" for job';
        $word = str_replace(' ', ', ' , $word);
        echo $word;

    }


}