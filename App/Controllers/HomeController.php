<?php 

namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $title = $this->html->setTitle('Welcome Home');
        $view = $this->view->render('home');
        return $this->Layout->render($view, $title);
    }


}