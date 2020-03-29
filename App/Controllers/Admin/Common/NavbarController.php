<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\Common;

use System\Controller;

class NavbarController extends Controller
{

    public function index()
    {
        return $this->view->render('/admin/common/navbar');
    }




}