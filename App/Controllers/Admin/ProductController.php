<?php

namespace App\Controllers\Admin;

use System\Controller;

class ProductController extends Controller
{

    public function index()
    {

        $title = $this->html->setTitle('المنتجات');
        $data['products'] = $this->load->model('Products')->all();
       //pre($data['products']);
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;
        //$this->load->model('Products')->deleteImage();
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



    public function submit()
    {
        $this->load->model('Products')->create();
        return $this->url->redirectTo('admin/product');
    }



    public function edit($id)
    {
        $productModel = $this->load->model('Products');
        if(! $productModel->exists($id)) {

            return $this->url->redirectTo('admin/product');
        }

        $productModel = $productModel->get($id);
        $productModel = (array) $productModel ;



        $data['categories']     = $this->load->model('Categories')->all();
        $data['brands']         = $this->load->model('Brand')->all();
        $data['subCategory']    = $this->load->model('SubCategories')->all();
        $data['minCategory']    = $this->load->model('MinSubCategories')->all();


        $data['id']         = array_get($productModel, 'id');
        $data['name']       = array_get($productModel, 'name');
        $data['title']      = array_get($productModel, 'title');
        $data['description']= array_get($productModel, 'description');
        $data['country']    = array_get($productModel, 'country');
        $data['unit']       = array_get($productModel, 'unit');
        $data['price']      = array_get($productModel, 'price');
        $data['total']      = array_get($productModel, 'total');
        $data['currency']   = array_get($productModel, 'currency');
        $data['discount']   = array_get($productModel, 'discount');
        $data['brandId']    = array_get($productModel, 'brand');
        $data['categoryId'] = array_get($productModel, 'category_id');
        $data['subId']      = array_get($productModel, 'sub_category_id');
        $data['minId']      = array_get($productModel, 'min_sub_category_id');

        $data['options'] = $this->load->model('Products')->getOptions($productModel['id']);
        $data['errors'] = $this->session->has('errors') ? implode('<br>', $this->session->pull('errors')) : null ;
        $data['action'] = $this->url->link('/admin/product/save/'. $productModel['id']);
        $data['actionImage'] = $this->url->link('/admin/product/uploadimage/' . $productModel['id']);
        $data['getAllImageById'] = $this->url->link('/admin/product/getdatamagebyid/' . $productModel['id']);
        $view = $this->view->render('admin/product/edit', $data);
        $title = $this->html->setTitle('Update Product');
        return $this->Layout->render($view, $title);
    }



    public function getsubcategoy()
    {
        return $this->load->model('Products')->getSubCategory();
    }


    public function getmincategoy()
    {
        return $this->load->model('Products')->getMinCategory();
    }


    public function getdatamagebyid($id)
    {
        $productModel = $this->load->model('Products');
        if(! $productModel->exists($id)) {

            return $this->url->redirectTo('admin/product');
        }

        $productModel = $productModel->get($id);
        $productModel = (array) $productModel ;
        return $this->load->model('Products')->getImageById($productModel['id']);
    }


    public function radio()
    {
        return $this->load->model('Products')->radioImage();
    }



    public function deleteimg($id)
    {
        return $this->load->model('Products')->deleteImage($id);
    }


    public function uploadimage($id)
    {
    $productModel = $this->load->model('Products');
    if(! $productModel->exists($id)) {

        return $this->url->redirectTo('admin/product');
    }

    $productModel = $productModel->get($id);
    $productModel = (array) $productModel ;
    return $this->load->model('Products')->uploadImage($productModel['id']);
}


    public function save($id)
    {

    }





}