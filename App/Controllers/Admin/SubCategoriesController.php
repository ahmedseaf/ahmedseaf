<?php


namespace App\Controllers\Admin;

use System\Controller;

class SubCategoriesController extends Controller
{
    public function index() {

//        $data = $this->load->model('SubCategories')->all();
//        if(count($data) > 0) {
//            echo 'yes';
//        }
//        else {
//            echo 'no';
//        }
        //pre(count($data));



        $title = $this->html->setTitle('اضافة قسم رئيسى جديد');
        $data['sub'] = $this->load->model('SubCategories')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('admin/categories/sub-category/list', $data);
        return $this->Layout->render($view, $title);
    }



    public function add() {

        return $this->form();

    }


    public function submit()
    {
//        pre($_POST);
      // pre($_FILES);

        $json = [];

        if($this->isValid()){
            $this->load->model('SubCategories')->create();
            $json['success'] = ' Sub Categories Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/sub-category');
            $this->session->set('message', ' Sub Categories Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }






    public function edit($id)
    {
        $SubCategoriesModel = $this->load->model('SubCategories');

        if (! $SubCategoriesModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $subCategory = $SubCategoriesModel->get($id);
        pre($subCategory);
        return $this->form($subCategory);
    }



    private function form($subCategory = null)
    {
        if ($subCategory) {
            // editing form
            $data['target'] = 'edit-sub-category-' . $subCategory->id;

            $data['action'] = $this->url->link('/admin/sub-category/save/' . $subCategory->id);

            $data['heading'] = 'Edit <b>' . $subCategory->name . '</b>';

            $data['buttonTitle'] = 'Update Sub Categories ';
        } else {
            // adding form
            $data['target'] = 'add-sub-category-form';

            $data['action'] = $this->url->link('/admin/sub-category/submit');

            $data['heading'] = 'Add New Sub Categories';

            $data['buttonTitle'] = 'Add New Sub Categories';

        }

        $subCategory = (array) $subCategory ;

        $data['image'] = '';
        if(! empty($subCategory['image'])) {$data['image'] = $this->url->link('public/images/'. $subCategory['image']);}
        $data['categoryId']  = array_get($subCategory, 'category_id');
        $data['name']  = array_get($subCategory, 'name');
        $data['titlesub']  = array_get($subCategory, 'title');
        $data['description']  = array_get($subCategory, 'description');
        $data['categories'] = $this->load->model('SubCategories')->all();
        $data['categoriesSub'] = $this->load->model('Categories')->all();

        return $this->view->render('/admin/categories/sub-category/form', $data);
    }



    public function save($id)
    {

        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation

            $this->load->model('SubCategories')->update($id);

            $json['success'] = ' Sub Categories Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/sub-category');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }



    public function delete($id)
    {
        $subCategory = $this->load->model('SubCategories');
        if (! $subCategory->exists($id)) {
            return $this->url->redirectTo('/404');
        }
        $json = [];
        if(isset($_POST['deleteAction'])) {
            if ($this->minSubCategoryExist($id)) {
                $subCategory->delete($id);
                $json['success'] = ' Sub Category Has Been Deleted Successfully';
                $json['redirectTo'] = $this->url->link('admin/sub-category');
                $this->session->set('message', ' Sub Category Has Been Deleted Successfully');

            }
            else {
                $json['errors'] = "You Cant Delete This Sub Category Before Delete Sub Category";
            }


            return $this->json($json);
        }
        return false;



    }



    private function isValid($id = null){
        $this->validator->required('name', 'Sub Category Name  Name Is Required');
        $this->validator->required('title', 'Sub Category TitleIs Required');
        $this->validator->required('description', 'Description Is Required');


        if(is_null($id)) {
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }


    private function minSubCategoryExist($id)
    {
        $subcategory = $this->load->model('SubCategories')->checkIfMinSubCategoryExists($id);
        if (count($subcategory) <= 0) {
            //Not Sub Category Record You Can Delete
            return true;
        }
        //Yes Sub Category Here You Can\'t Delete
        else return false;
    }






}