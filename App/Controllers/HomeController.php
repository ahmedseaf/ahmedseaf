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




    public function products($productTitle, $productId)
    {
//        $data['towProducts']        = $this->load->model('Home')->loadSliders(8, 2);
//        $title  = $this->html->setTitle('شركة الحرية للتوريدات');
//        $view   = $this->view->render('main-pages/product/'.$productId, $data);



        $productModel = $this->load->model('Home')->allProducts($productTitle, $productId);
        $productModel = $this->ToArray($productModel);
        if(! $productModel['id']) {

            return $this->url->redirectTo('/');
        }

       // $productModel = $productModel->get($productId);

        pre($productModel);

        pre($this->request->url());
        pre(rawurldecode($this->request->url()));

//        $data['id']         = array_get($productModel, 'id');
//        $data['name']       = array_get($productModel, 'name');
//        $data['title']      = array_get($productModel, 'title');
//        $data['description']= array_get($productModel, 'description');
//        $data['country']    = array_get($productModel, 'country');
//        $data['unit']       = array_get($productModel, 'unit');
//        $data['price']      = array_get($productModel, 'price');
//        $data['total']      = array_get($productModel, 'total');
//        $data['currency']   = array_get($productModel, 'currency');
//        $data['discount']   = array_get($productModel, 'discount');
//        $data['brandId']    = array_get($productModel, 'brand');
//        $data['categoryId'] = array_get($productModel, 'category_id');
//        $data['subId']      = array_get($productModel, 'sub_category_id');
//        $data['minId']      = array_get($productModel, 'min_sub_category_id');
//
//        $data['options'] = $this->load->model('Products')->getOptions($productModel['id']);
//        $data['errors'] = $this->session->has('errors') ? implode('<br>', $this->session->pull('errors')) : null ;
//        $data['action'] = $this->url->link('/admin/product/save/'. $productModel['id']);
//        $data['actionImage'] = $this->url->link('/admin/product/uploadimage/' . $productModel['id']);
//        $data['getAllImageById'] = $this->url->link('/admin/product/getdatamagebyid/' . $productModel['id']);
//        $view = $this->view->render('admin/product/edit', $data);
//        $title  = $this->html->setTitle( 'شركة الحرية للتوريدات');
//
//
//
//        return $this->webLayout->render($view, $title);
    }








}