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
 * @property mixed url
 */
class NavbarWebController extends Controller
{

    public function index()
    {
        $settings = $this->load->model('Setting')->all();
        $settings = $this->ToArray($settings);
        $data['logo'] = $this->url->link('public/images/'. $settings['logo']);

        $data['homeCards']          = $this->load->model('MainPage')->selectBySlideNameNavbar(9,3);
        $data['productCards']       = $this->load->model('MainPage')->selectBySlideNameNavbar(9,4);
        $data['productCards2']      = $this->load->model('MainPage')->selectBySlideNameNavbar(9,4);
        $data['navSlides']          = $this->load->model('Home')->loadSliders(10, 1);
        $data['brands']             = $this->load->model('Brand')->all();
        $data['subCategories'] = $this->load->model('SubCategories')->all();
        return $this->view->render('/admin/webcommon/navbar', $data);
    }






}