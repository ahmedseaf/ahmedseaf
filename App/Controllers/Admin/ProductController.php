<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 09/12/2019
 * Time: 09:10 ص
 */

namespace App\Controllers\Admin;


use System\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $title = $this->html->setTitle('المنتجات');
        $data['products'] = $this->load->model('Products')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('admin/product/list', $data);
        return $this->Layout->render($view, $title);
    }



    public function add()
    {
       $title = $this->html->setTitle('اضافة منتج');
        //$data['products'] = $this->load->model('Products')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;
        $data['action'] = $this->url->link('/admin/product/submit');
        $data['categories'] = $this->load->model('Categories')->all();
        $data['brands'] = $this->load->model('Brand')->all();
        $view = $this->view->render('admin/product/add', $data);
        return $this->Layout->render($view,$title);
    }

    //TODO:: Add Image Class And Model To Product

    public function submit()
    {

    }



    public function getsubcategoy()
    {
        return $this->load->model('Products')->getSubCategory();
    }


    public function getmincategoy()
    {
        return $this->load->model('Products')->getMinCategory();
    }




}