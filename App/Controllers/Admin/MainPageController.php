<?php


namespace App\Controllers\Admin;

use System\Controller;

/**
 * @property mixed html
 * @property mixed load
 * @property mixed session
 * @property mixed view
 * @property mixed Layout
 * @property mixed url
 * @property mixed validator
 */
class MainPageController extends Controller
{


    public function index() {
// pre($this->load->model('MainPage')->selectBySlideName(4));

        $title                      = $this->html->setTitle('Main Page Controllers ');
        $data['mainSliders']        = $this->load->model('MainPage')->selectBySlideName(1);
        $data['repeatSliders']      = $this->load->model('MainPage')->selectBySlideName(2);
        $data['towSliders']         = $this->load->model('MainPage')->selectBySlideName(3);
        $data['someSliders']        = $this->load->model('MainPage')->selectBySlideName(4);
        $data['fiveLargeSliders']   = $this->load->model('MainPage')->selectBySlideName(5);
        $data['fiveSmallSliders']   = $this->load->model('MainPage')->selectBySlideName(6);
        $data['towProducts']        = $this->load->model('MainPage')->selectBySlideName(7);
        $data['result']             = $this->session->has('message') ? $this->session->pull('message') : null ;
        $view                       = $this->view->render('admin/main-page/main', $data);
        return $this->Layout->render($view, $title);
    }


    public function add() {

        return $this->form();

    }


    private function form()
    {
        $data['action']         = $this->url->link('/admin/main-page/submit');
        $data['heading']        = 'Add New Slide To Main Page';
        $data['buttonTitle']    = 'Add New Slide';
        return $this->view->render('/admin/main-page/form', $data);
    }


    public function submit()
    {


        $json = [];
        if($this->isValid()){
            $this->load->model('MainPage')->create();
            $json['success'] = ' Slide Has Been Created Successfully';
            $json['redirectTo'] = $this->url->link('admin/main-page');
            $this->session->set('message', ' Slide Has Been Created Successfully');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);
    }



    private function isValid(){
        //TODO:: Add Link To Product
        $this->validator->required('title', 'Image Title Is Required');
        $this->validator->required('slideHint', 'Slide Name Is Required');
        $this->validator->image('image');
        return $this->validator->passes();
    }


    public function delete($id)
    {

        $mainPageModel = $this->load->model('MainPage');
        $mainPageModel->delete($id);
        $json['successSlide'] = 'Slide Has Been Deleted Successfully';
        $json['redirectTo'] = $this->url->link('admin/main-page');
        return $this->json($json);

    }





}