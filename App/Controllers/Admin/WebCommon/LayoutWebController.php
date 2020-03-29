<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\WebCommon;

use System\Controller;
use System\View\ViewInterface;

class LayoutWebController extends Controller
{

    public function render(ViewInterface $view)
    {
        $data['content']    = $view;
        $data['header']     = $this->load->controller('Admin/WebCommon/HeaderWeb')->index();
        $data['navbar']     = $this->load->controller('Admin/WebCommon/NavbarWeb')->index();
        $data['footer']     = $this->load->controller('Admin/WebCommon/FooterWeb')->index();

        return $this->view->render('/admin/webcommon/layout', $data);
    }




}