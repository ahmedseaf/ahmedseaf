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
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

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
            //$this->session->set('messageAdd', 'Ahmed Category Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }


    private function isValid(){
         $this->validator->required('name', 'Category Name Is Required');
         return $this->validator->passes();
    }


    public function edit($id){

        $categoriesModel = $this->load->model('Categories');

        if(! $categoriesModel->exists($id)) {

            return $this->url->redirectTo('admin/categories');
        }

        $data['errors'] = $this->session->has('errors') ? implode('<br>', $this->session->pull('errors')) : null ;
        $data['categories'] = $categoriesModel->get($id);
        $view = $this->view->render('admin/categories/edit', $data);
        $title = $this->html->setTitle('Update Categories ');
        return $this->Layout->render($view, $title);
    }


    public function save($id)
    {
        $categoriesModel = $this->load->model('Categories');

        if(! $categoriesModel->exists($id)) {

            return $this->url->redirectTo('admin/categories');
        }



        if($this->isValid()) {
            $this->load->model('Categories')->update($id);

        }else {
            $this->session->set('errors', $this->validator->getMessages());
            return $this->url->redirectTo('admin/categories/edit/'. $id);
        }


        $this->session->set('message', 'Category Has Been Update Successfully');

        return $this->url->redirectTo('admin/categories');
    }




    public function delete($id) {
        $categoriesModel = $this->load->model('Categories');

        if(! $categoriesModel->exists($id)) {

            return $this->url->redirectTo('admin/categories');
        }

        $categoriesModel->delete($id);
        $this->session->set('message', ' Category Has Been Deleted Successfully');

    }






}