<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin\WebCommon;

use System\Controller;

/**
 * @property mixed load
 * @property mixed view
 */
class NavbarWebController extends Controller
{

    public function index()
    {
       // pre($this->load->model('SubCategories')->all());
        $data['subCategories'] = $this->load->model('SubCategories')->all();
        return $this->view->render('/admin/webcommon/navbar', $data);
    }




}