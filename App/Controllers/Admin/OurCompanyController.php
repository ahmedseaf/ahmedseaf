<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

/**
 * @property mixed validator
 * @property mixed html
 * @property mixed load
 * @property mixed view
 * @property mixed session
 * @property mixed Layout
 * @property mixed url
 */
class OurCompanyController extends Controller
{
    public function index()
    {

        $title = $this->html->setTitle('اضافة ماركة جديدة');
        $data['ourCompany'] = $this->load->model('ourCompany')->all();
        $data['result'] = $this->session->has('message') ? $this->session->pull('message') : null ;

        $view = $this->view->render('ourcompany/list', $data);
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
            $this->load->model('ourCompany')->create();
            $json['success'] = ' our Company Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/company');
            $this->session->set('message', ' our Company Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }






    public function edit($id)
    {
        $ourCompanyModel = $this->load->model('ourCompany');

        if (! $ourCompanyModel->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $ourCompany = $ourCompanyModel->get($id);
      
        return $this->form($ourCompany);
    }



    private function form($ourCompany = null)
    {
        if ($ourCompany) {
            // editing form
            $data['target'] = 'edit-company-' . $ourCompany->id;

            $data['action'] = $this->url->link('/company/save/' . $ourCompany->id);

            $data['heading'] = 'Edit <b>' . $ourCompany->name . '</b>';

            $data['buttonTitle'] = 'Update ourCompany ';
        } else {
            // adding form
            $data['target'] = 'add-company-form';

            $data['action'] = $this->url->link('/admin/company/submit');

            $data['heading'] = 'Add New our Company';

            $data['buttonTitle'] = 'Add New ourCompany';

        }

        $ourCompany = (array) $ourCompany ;

       
        $data['image'] = '';
        if(! empty($ourCompany['image'])) {$data['image'] = $this->url->link('public/images/'. $ourCompany['image']);}
        $data['name']  = array_get($ourCompany, 'name');
        
        return $this->view->render('/ourcompany/form', $data);
    }



    public function save($id)
    {

        $json = [];

        if ($this->isValid($id)) {
            // it means there are no errors in form validation

            $this->load->model('ourCompany')->update($id);

            $json['success'] = ' ourCompany Has Been Updated Successfully';

            $json['redirectTo'] = $this->url->link('admin/company');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }



    public function delete($id)
    {


        $json = [];
        $ourCompany = $this->load->model('ourCompany');

        if (! $ourCompany->exists($id)) {
            return $this->url->redirectTo('/404');
        }

        $ourCompany->delete($id);
        $this->session->set('message', ' our Company Has Been Deleted Successfully');
        $json['success'] = ' ourCompany Has Been Deleted Successfully';
        return ($this->json($json));




    }



    private function isValid($id = null){
        $this->validator->required('name', 'our Company Name Is Required');


        if(is_null($id)) {
            $this->validator->requiredFile('image')->image('image');
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }








}