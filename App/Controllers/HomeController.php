<?php 

namespace App\Controllers;

use System\Controller;

/**
 * @property mixed load
 * @property mixed html
 * @property mixed view
 * @property mixed webLayout
 * @property mixed url
 * @property mixed request
 */
class HomeController extends Controller
{
    public function index()
    {
      // pre($this->load->model('Home')->bestOffer(10));

        $data['bestOffers']         = $this->load->model('Home')->bestOffer(30);
        $data['newProducts']         = $this->load->model('Home')->newProducts(30);

        $data['mainSliders']        = $this->load->model('Home')->loadSliders(1, 6);
        $data['repeatSliders']      = $this->load->model('Home')->loadSliders(2, 7);
        $data['towSliders']         = $this->load->model('Home')->loadSliders(3, 2);
        $data['someSliders']        = $this->load->model('Home')->loadSliders(4, 8);
        $data['foreSliders']        = $this->load->model('Home')->loadSliders(5, 4);
        $data['fiveLargeSliders']   = $this->load->model('Home')->loadSliders(6, 1);
        $data['fiveSmallSliders']   = $this->load->model('Home')->loadSliders(7, 4);
        $data['towProducts']        = $this->load->model('Home')->loadSliders(8, 2);
        $title  = $this->html->setTitle('شركة الحرية للتوريدات');
        $view   = $this->view->render('home', $data);
        return $this->webLayout->render($view, $title);
    }







    public function products( $productId)
    {
        $productModel = $this->load->model('Home')->allProducts( $productId);
        $productModel = $this->ToArray($productModel);
        if(! $productModel['id']) {

            return $this->url->redirectTo('/');
        }

        $data['productTitle'] = $productModel['name'];
        $view = $this->view->render('admin/main-page/product', $data);
        $title  = $this->html->setTitle( $productModel['name'].' | '.' شركة الحرية للتوريدات');



        return $this->webLayout->render($view, $title);
    }












    public function productView($productId)
    {
        $productModel = $this->load->model('Home')->getProductById($productId);
        if(count($productModel) == 0) {
            return $this->productComingSoon();

        }

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


        $data['likeProducts'] = $this->load->model('Home')->getLikeProduct($proName);


        $view = $this->view->render('admin/main-page/product',$data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function allCategory()
    {
//pre($this->load->model('Home')->getAllCategory());

        $data['allCategory'] = $this->load->model('Home')->getAllCategory();
        $view = $this->view->render('admin/main-page/category', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function subCategory($subCategoryId)
    {
       $subCategoryModel = $this->load->model('Home')->getAllSubCategory($subCategoryId);
       if(count($subCategoryModel) == 0) {
          return $this->productComingSoon();

        }

//        $data['maincategory'] = $this->load->model('Home')->getAllMainSubCategory($subCategoryId);
//       // $mainSubCategoryModel = (array) $mainSubCategoryModel;
//       // $data['maincategory'] = array_get($mainSubCategoryModel, 'sub_category_id');
        $data['subcategories'] = $this->load->model('Home')->getAllSubCategory($subCategoryId);
        $view = $this->view->render('admin/main-page/sub-category', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function mainCategory($mainSubCategoryId)
    {
        //pre($this->load->model('Home')->getAllMainSubCategory(15));
        $mainSubCategoryModel = $this->load->model('Home')->getAllMainSubCategory($mainSubCategoryId);


        if(count($mainSubCategoryModel) == 0) {
            return $this->productComingSoon();

        }
        $data['mainSubcategories'] = $this->load->model('Home')->getAllMainSubCategory($mainSubCategoryId);

        $view = $this->view->render('admin/main-page/main-category', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function productFilter($productId)
    {


        $productModel = $this->load->model('Home')->getProductByMainCategoryId($productId);


        if(count($productModel) == 0) {
            return $this->productComingSoon();

        }

        $data['products'] = $this->load->model('Home')->getProductByMainCategoryId($productId);
        $view = $this->view->render('admin/main-page/product-filter', $data);
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    private function productComingSoon()
    {
        $view = $this->view->render('admin/main-page/no-product');
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }

    public function test()
    {
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
//        $productName = $this->load->model('Home')->getLikeProduct('نجارة');
//        pre($productName);
//        $productName = $this->ToArray($productName);
//        pre($productName['name']);
       // $productName = (array) $productName;
        //pre(array_get($productName, 'id'));
    }

}