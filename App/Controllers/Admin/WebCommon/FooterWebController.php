<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\WebCommon;

use System\Controller;

class FooterWebController extends Controller
{

    public function index()
    {
        return $this->view->render('/admin/webcommon/footer');
    }




}