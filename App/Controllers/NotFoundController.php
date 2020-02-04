<?php

namespace App\Controllers;

use System\Controller;


class NotFoundController extends Controller
{

    public function index()
    {
        $title = $this->app->html->setTitle('404');
        $view   = $this->app->view->render('admin/not-found');
        return $this->app->webLayout->render($view, $title);
    }











}