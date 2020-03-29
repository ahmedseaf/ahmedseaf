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
 * @property mixed url
 * @property mixed html
 * @property mixed view
 */
class FooterWebController extends Controller
{

    public function index()
    {
        $data['ourInfo'] = $this->load->model('ContactUs')->viewAboutList();
        $data['aboutCompany'] = $this->load->model('Setting')->all();
        return $this->view->render('/admin/webcommon/footer', $data);
    }




}