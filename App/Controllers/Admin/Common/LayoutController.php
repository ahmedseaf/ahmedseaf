<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\Common;

use System\Controller;
use System\View\ViewInterface;

class LayoutController extends Controller
{

    public function render(ViewInterface $view)
    {
        $data['content']    = $view;
        $data['header']     = $this->load->controller('Admin/Common/Header')->index();
        $data['navbar']     = $this->load->controller('Admin/Common/Navbar')->index();
        $data['sidebar']    = $this->load->controller('Admin/Common/Sidebar')->index();
        $data['footer']     = $this->load->controller('Admin/Common/Footer')->index();

        return $this->view->render('/admin/common/layout', $data);
    }




}