<?php 

namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $title = $this->html->setTitle('Welcome Web');
        $view = $this->view->render('home');
        return $this->webLayout->render($view, $title);
    }


}