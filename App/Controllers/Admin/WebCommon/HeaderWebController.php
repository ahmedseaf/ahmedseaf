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
class HeaderWebController extends Controller
{

    public function index()
    {
        $settings = $this->load->model('Setting')->all();
        $settings = $this->ToArray($settings);

        $data['logo'] = $this->url->link('public/images/'. $settings['logo']);
        $data['fave'] = $this->url->link('public/images/'. $settings['fave_icon']);


        $data['title'] = $this->html->getTitle();
        $data['settings'] = $this->load->model('Setting')->all();
        return $this->view->render('/admin/webcommon/header', $data);
    }


    public function test()
    {

        $word = 'bosch grending 7" for job';
        $word = str_replace(' ', ', ' , $word);
        echo $word;

    }


}