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
        $categoriesModel = $categoriesModel->get($id);
        $categoriesModel = (array) $categoriesModel;
        $data['errors'] = $this->session->has('errors') ? implode('<br>', $this->session->pull('errors')) : null ;
        $data['categoryId']  = array_get($categoriesModel, 'id');
        $data['categoryName']  = array_get($categoriesModel, 'name');
        $data['categoryStatus']  = array_get($categoriesModel, 'status');


        $data['catImage'] = '';
        if(! empty($categoriesModel['image'])) {$data['catImage'] = $this->url->link('public/images/'. $categoriesModel['image']);}

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

        if(isset($_POST['deleteAction'])) {
            //pre($_POST['deleteAction']);
            if ($this->subCategoryExist($id)) {
                $categoriesModel->delete($id);
                $json['success'] = ' Category Has Been Deleted Successfully';
                $json['redirectTo'] = $this->url->link('admin/categories');
                $this->session->set('message', ' Category Has Been Deleted Successfully');

            }
            else {
                $json['errors'] = "You Cant Delete This Category Before Delete Sub Category";
            }


            return $this->json($json);
        }
        return false;
    }



    private function subCategoryExist($id)
    {
        $subcategory = $this->load->model('Categories')->checkIfSubCategoryExists($id);
        if (count($subcategory) <= 0) {
            //Not Category Record You Can Delete
            return true;
        }
        //Yes Category Here You Can\'t Delete
        else return false;
    }

}