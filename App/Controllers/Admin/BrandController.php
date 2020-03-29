<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

class BrandController extends Controller
{
    public function index() {

        $title = $this->html->setTitle('اضافة ماركة جديدة');
        $data['brands'] = $this->load->model('Brand')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('admin/brand/list', $data);
        return $this->Layout->render($view, $title);
    }



    public function add() {

        return $this->form();

    }


    public function submit()
    {
//        pre($_POST);
//        pre($_FILES);

        $json = [];

        if($this->isValid()){
            $this->load->model('Brand')->create();
            $json['success'] = ' Sub Brands Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/brand');
            $this->session->set('message', ' Sub Brands Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }






    public function edit($id)
    {
        $BrandModel = $this->load->model('Brand');

        if (! $BrandModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $brands = $BrandModel->get($id);
      
        return $this->form($brands);
    }



    private function form($brands = null)
    {
        if ($brands) {
            // editing form
            $data['target'] = 'edit-brand-' . $brands->id;

            $data['action'] = $this->url->link('/admin/brand/save/' . $brands->id);

            $data['heading'] = 'Edit <b>' . $brands->name . '</b>';

            $data['buttonTitle'] = 'Update Brands ';
        } else {
            // adding form
            $data['target'] = 'add-brand-form';

            $data['action'] = $this->url->link('/admin/brand/submit');

            $data['heading'] = 'Add New Brands';

            $data['buttonTitle'] = 'Add New Brands';

        }

        $brands = (array) $brands ;

        $data['imageHeader'] = '';
        if(! empty($brands['image_header'])) {$data['imageHeader'] = $this->url->link('public/images/'. $brands['image_header']);}

        $data['image'] = '';
        if(! empty($brands['image'])) {$data['image'] = $this->url->link('public/images/'. $brands['image']);}
        $data['name']  = array_get($brands, 'name');
        $data['title']  = array_get($brands, 'title');
        $data['description']  = array_get($brands, 'description');
        return $this->view->render('/admin/brand/form', $data);
    }



    public function save($id)
    {

        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation

            $this->load->model('Brand')->update($id);

            $json['success'] = ' Brands Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/brand');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }



    public function delete($id)
    {

        //TODO:: Check For Data in Database Before Delete Record

        $json = [];
        $brands = $this->load->model('Brand');

        if (! $brands->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $brands->delete($id);
        $this->session->set('message', ' brand Has Been Deleted Successfully');
        $json['success'] = ' Brands Has Been Deleted Successfully';
        return ($this->json($json));




    }



    private function isValid($id = null){
        $this->validator->required('name', 'brand Name Is Required');


        if(is_null($id)) {
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }








}