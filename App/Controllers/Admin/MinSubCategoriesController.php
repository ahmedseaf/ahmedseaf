<?php


namespace App\Controllers\Admin;

use System\Controller;

class MinSubCategoriesController extends Controller
{
    public function index() {


//        $allCategory = $this->load->model('Categories')->all();
//        pre($allCategory);


        $title = $this->html->setTitle('اضافة قسم فرعى جديد');
        $data['minCategories'] = $this->load->model('MinSubCategories')->all();
        $data['Categories'] = $this->load->model('Categories')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('admin/categories/min-category/list', $data);
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
            $this->load->model('MinSubCategories')->create();
            $json['success'] = ' Min Sub Categories Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/min-category');
            $this->session->set('message', ' Min Sub Categories Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }






    public function edit($id)
    {
        $MinSubCategoriesModel = $this->load->model('MinSubCategories');

        if (! $MinSubCategoriesModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $minSubCategory = $MinSubCategoriesModel->get($id);
        //pre($minSubCategory);
        return $this->form($minSubCategory);
    }



    private function form($minSubCategory = null)
    {
        if ($minSubCategory) {
            // editing form
            $data['target'] = 'edit-min-category-' . $minSubCategory->id;

            $data['action'] = $this->url->link('/admin/min-category/save/' . $minSubCategory->id);

            $data['heading'] = 'Edit <b>' . $minSubCategory->name . '</b>';

            $data['minbuttonTitle'] = 'Update Min Sub Categories ';
        } else {
            // adding form
            $data['target'] = 'add-min-category-form';

            $data['action'] = $this->url->link('/admin/min-category/submit');

            $data['heading'] = 'Add New Min Sub Categories';

            $data['minbuttonTitle'] = 'Add New Min Sub Categories';

        }

        $minSubCategory = (array) $minSubCategory ;

        $data['minImage'] = '';
        if(! empty($minSubCategory['image'])) {$data['minImage'] = $this->url->link('public/images/'. $minSubCategory['image']);}
        $data['categoryId']  = array_get($minSubCategory, 'category_id');
        $data['subCategoryId']  = array_get($minSubCategory, 'sub_category_id');
        $data['minName']  = array_get($minSubCategory, 'name');
        $data['minTitle']  = array_get($minSubCategory, 'title');
        $data['description']  = array_get($minSubCategory, 'description');
        $data['categories'] = $this->load->model('MinSubCategories')->all();
        $data['categoriesSub'] = $this->load->model('Categories')->all();

        return $this->view->render('/admin/categories/min-category/form', $data);
    }



    public function save($id)
    {

        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation

            $this->load->model('MinSubCategories')->update($id);

            $json['success'] = ' Min Sub Categories Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/min-category');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }



    public function delete($id)
    {

        //TODO:: Check For Data in Database Before Delete Record
//        $data = $this->load->model('MinSubCategories')->all();
//        if(count($data) > 0) {
//            $this->session->set('message', ' you cant delete');
//            $json['errors'] = 'Min Sub Categories cant delete';



            $json = [];
            $minSubCategory = $this->load->model('MinSubCategories');

            if (! $minSubCategory->exists($id)) {
                return $this->url->redirectTo('/404');
            }

            $minSubCategory->delete($id);
            $this->session->set('message', ' Sub Category Has Been Deleted Successfully');
            $json['success'] = 'Min Sub Categories Has Been Deleted Successfully';
            return ($this->json($json));




    }



    private function isValid($id = null){
        $this->validator->required('name', 'Sub Category Name  Name Is Required');
        $this->validator->required('title', 'Sub Category TitleIs Required');
        $this->validator->required('description', 'Description Is Required');
        $this->validator->required('sub_category_id', 'Sub Category Name Is Required');


        if(is_null($id)) {
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }




    public function select()
    {
        return $this->load->model('MinSubCategories')->getDataSelectBox();
    }





}