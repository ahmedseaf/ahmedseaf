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



    public function productstest()
    {

        $view = $this->view->render('admin/main-page/product');
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function allcategory()
    {
        $view = $this->view->render('admin/main-page/category');
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function subcategory()
    {
        $view = $this->view->render('admin/main-page/sub-category');
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }


    public function maincategory()
    {
        $view = $this->view->render('admin/main-page/main-category');
        $title  = $this->html->setTitle(' شركة الحرية للتوريدات');
        return $this->webLayout->render($view, $title);
    }



}