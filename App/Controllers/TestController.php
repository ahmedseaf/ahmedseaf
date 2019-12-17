<?php 

namespace App\Controllers;

use System\Controller;

class TestController extends Controller
{
    public function index()
    {

        $data['images'] = $this->load->model('Test')->all();
        $view = $this->view->render('test/upload-image', $data);

        return $this->Layout->render($view);

    }

    public function getdata()
    {
        return $this->load->model('Test')->action();
    }

    public function radio()
    {
        return $this->load->model('Test')->radioImage();
    }

    public function submit()
    {

        $json = [];

        if($this->isValid()){
            $this->load->model('Test')->create();

           // $json['redirectTo'] = $this->url->link('/test');
        }else {
            $json['errors'] = implode('<br>' , $this->validator->getMessages());

        }
        return $this->json($json);

    }

    private function isValid($id = null){

        $this->validator->image('uploadFile');

        return $this->validator->passes();
    }

    public function delete($id) {
        $imageModel = $this->load->model('Test');
        $imageModel->delete($id);

    }

    public function search()
    {
        return $this->load->model('Test')->searchItem();
    }







}