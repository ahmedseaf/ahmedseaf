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
 * @property mixed html
 * @property mixed webLayout
 * @property mixed request
 * @property mixed session
 *
 */
class NavbarWebController extends Controller
{



    public function index()
    {
       // echo url(isset($_SERVER['REQUEST_URI']) ? rawurldecode($_SERVER['REQUEST_URI']) : '');

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


    public function search()
    {
        if(isset($_POST['check'])) {
            $search = $_POST['search'];
            $data['productFiltersTop']      = $this->load->model('MainPage')->selectBySlideNameNavbar(11, 1);
            $data['productFiltersRight']    = $this->load->model('MainPage')->selectBySlideNameNavbar(12, 1);
            $data['products']               = $this->load->model('Navbar')->getProductBySearch($search);

            $view   = $this->view->render('admin/main-page/search', $data);
            $title  = $this->html->setTitle($_POST['search'] .'البحث عن | ');
            return $this->webLayout->render($view, $title);
        }




    }

    public function checksearch()
    {

        $this->load->model('Navbar')->checkSearch();

    }



}