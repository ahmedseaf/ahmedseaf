<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\Common;

use System\Controller;

class FooterController extends Controller
{

    public function index()
    {
        return $this->view->render('/admin/common/footer');
    }




}