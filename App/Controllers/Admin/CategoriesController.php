<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

class CategoriesController extends Controller
{
    public function index()
    {

        $title = $this->html->setTitle('Categories');
        $data['categories'] = $this->load->model('Categories')->all();
        $view = $this->view->render('admin/categories/list', $data);
        return $this->Layout->render($view, $title);
    }


    public function add() {

        $data['action'] = $this->url->link('/admin/categories/insert');
        return $this->view->render('admin/categories/add', $data);
    }


    public function insert()
    {
        $json = [];

        if($this->isValid()){
            $this->load->model('Categories')->create();
            $json['success'] = 'Category Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/categories');
            $this->session->set('messageAdd', 'Ahmed Category Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }


    private function isValid(){
         $this->validator->required('name', 'Category Name Is Required');
         return $this->validator->passes();
    }


    public function ahmed(){
        echo 'welcome Ahmed';
    }
}