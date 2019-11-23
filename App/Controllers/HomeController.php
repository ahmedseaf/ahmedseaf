<?php 

namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    public function index()
    {

       //return $this->view->render('home');
        //$this->db;
    //$this->db->data(['name' => 'احمد'])->insert('users_groups');

//        $user = $this->db->select('*')->from('users_groups')->orderBy('id')->fetchAll();
//        pre($user);

    // echo $this->url->link('home/t');

        echo 'welcome To Home Controllers';
       
    }
}