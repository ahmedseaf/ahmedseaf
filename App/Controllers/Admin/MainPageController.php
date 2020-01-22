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
 */
class MainPageController extends Controller
{


    public function index() {


        $title              = $this->html->setTitle('Main Page Controllers ');
        $data['users']      = $this->load->model('Users')->all();
        $data['result']     = $this->session->has('message') ? $this->session->pull('message') : null ;
        $view               = $this->view->render('admin/main-page/main', $data);
        return $this->Layout->render($view, $title);
    }


    public function add() {

        return $this->form();

    }




    private function form()
    {
            $data['target'] = 'add-sub-category-form';

            $data['action'] = $this->url->link('/admin/main-page/submit');

            $data['heading'] = 'Add New Sub Categories';

            $data['buttonTitle'] = 'Add New Slide';


        return $this->view->render('/admin/main-page/form');
    }




}