<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

/**
 * @property mixed load
 * @property mixed html
 * @property mixed session
 * @property mixed view
 * @property mixed Layout
 * @property mixed validator
 * @property mixed url
 * @property mixed webLayout
 */
class AboutUsController extends Controller
{
    public function index()
    {


    }

    public function aboutUs()
    {
        $title  = $this->html->setTitle('حول الشركة | شركة الحرية للتوريدات  ');
        $view   = $this->view->render('aboutUs/aboutUs');
        return $this->webLayout->render($view, $title);
    }










}