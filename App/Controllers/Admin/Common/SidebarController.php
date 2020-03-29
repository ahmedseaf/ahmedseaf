<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\Common;

use System\Controller;

class SidebarController extends Controller
{

    public function index()
    {
        $data['title'] = $this->html->getTitle();
        return $this->view->render('/admin/common/sidebar', $data);
    }




}